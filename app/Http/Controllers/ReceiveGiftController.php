<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiveGiftIndexRequest;
use App\Services\UserAgentService;
use Jenssegers\Agent\Agent;
use Psr\Log\LoggerInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Repositories\GiftRepository;
use App\Repositories\InviteRepository;
use App\Repositories\GiftTypeRepository;
use App\Http\Requests\ReceiveGiftRequest;
use App\Services\MailingService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReceiveGiftController extends Controller
{
    private $inviteRepository;
    private $giftRepository;
    private $giftTypeRepository;
    private $mailingService;
    private $userAgentService;
    private $logger;

    public function __construct(
        InviteRepository $inviteRepository,
        GiftRepository $giftRepository,
        GiftTypeRepository $giftTypeRepository,
        MailingService $mailingService,
        UserAgentService $userAgentService,
        LoggerInterface $logger
    ) {
        $this->inviteRepository = $inviteRepository;
        $this->giftRepository = $giftRepository;
        $this->giftTypeRepository = $giftTypeRepository;
        $this->mailingService = $mailingService;
        $this->userAgentService = $userAgentService;
        $this->logger = $logger;
    }

    public function index(ReceiveGiftIndexRequest $request)
    {
        $invite = $this->inviteRepository->findByCode($request->getInviteCode());
        if ($invite === null) {
            return View::make('index')->with('error', 'Invite code not found');
        }

        if ($invite->isUsed()) {
            return View::make('index')->with('error', 'Уже использовано');
        }

        $gift = $this->giftRepository->findByInviteId($invite->id);
        if ($gift === null) {
            return redirect()->route('get.code-list.invite.path-param', ['code' => $invite->code]);
        }

        return View::make('code', [
            'gift' => $gift,
        ]);
    }

    public function handle(ReceiveGiftRequest $request, Agent $agent)
    {
        $invite = $this->inviteRepository->findByCode($request->getInviteCode());
        if ($invite === null) {
            throw new NotFoundHttpException('Invite not found');
        }

        try {
            if ($invite->isUsed()) {
                $gift = $this->giftRepository->findByInviteId($invite->id);
                if ($gift === null) {
                    $invite->updated_at = null;
                    $invite->save();
                    return redirect()->route("get.code-list.invite.path-param", ['code' => $invite->code]);
                }

                return View::make('index')->with('error', 'Уже использовано');
            }

            $giftType = $this->giftTypeRepository->findById($request->getGiftTypeId());
            if ($giftType === null) {
                throw new NotFoundHttpException('Gift type not found');
            }

            if (!$invite->is_vip && $giftType->is_vip) {
                throw new \Exception('Подмена типа подарка!');
            }

            $gift = $this->giftRepository->findFirstUnusedByTypeId($giftType->id);
            if ($gift === null) {
                throw new NotFoundHttpException('This gift not found');
            }

            try {
                DB::beginTransaction();
                $invite->switchToUsed();
                $invite->email = $request->getEmail();
                $invite->save();
                $gift->switchToUsed();
                $gift->invite_id = $invite->id;
                $gift->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            $giftTypes = $this->giftTypeRepository->getGiftTypesList();
            return View::make($invite->is_vip ? 'gifts-vip' : 'gifts')
                ->with('error', $e->getMessage())
                ->with('giftTypes', $giftTypes)
                ->with('invite', $invite)
                ->with('giftCountsByTypes', $this->giftTypeRepository->countGiftsByTypes(
                    $giftTypes,
                    $this->giftRepository->findAllUnused()
                ));
        }

        $this->userAgentService->storeUserAgentData($request, $invite->id);
        $this->mailingService->sendEmailWithGift($invite->email, $gift);

        return View::make('thanks');
        //return View::make('code')->with('gift', $gift);
    }
}
