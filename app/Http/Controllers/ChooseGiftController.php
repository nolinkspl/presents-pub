<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChooseGiftRequest;
use App\Repositories\GiftRepository;
use App\Repositories\GiftTypeRepository;
use App\Repositories\InviteRepository;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\View;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChooseGiftController extends Controller
{
    private $inviteRepository;
    private $giftRepository;
    private $giftTypeRepository;
    private $logger;

    public function __construct(
        InviteRepository $inviteRepository,
        GiftRepository $giftRepository,
        GiftTypeRepository $giftTypeRepository,
        LoggerInterface $logger
    ) {
        $this->inviteRepository = $inviteRepository;
        $this->giftRepository = $giftRepository;
        $this->giftTypeRepository = $giftTypeRepository;
        $this->logger = $logger;
    }

    /**
     * @param ChooseGiftRequest $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(ChooseGiftRequest $request)
    {
        if (Browser::isIE()) {
            return View::make('stun');
        }

        $code = $request->getCode();

        try {
            $invite = $this->inviteRepository->findByCode($code);
            if ($invite === null) {
                throw new NotFoundHttpException('Invite not found');
            }

            if ($invite->isUsed()) {
                //return redirect()->route('receive-gift-index', ['code' => $invite->code]);
                throw new NotFoundHttpException('Invite already used');
            }

            $unusedGifts = $this->giftRepository->findAllUnused();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            return View::make('index')->with('error', $e->getMessage());
        }

        $giftCountsByTypes = $this->giftTypeRepository->countGiftsByTypes(
            $this->giftTypeRepository->getGiftTypesList(),
            $unusedGifts
        );

        //return View::make($invite->is_vip ? 'gifts-vip' : 'gifts')
        return View::make('gifts')
             ->with('invite', $invite)
             ->with('giftCountsByTypes', $giftCountsByTypes);
    }
}
