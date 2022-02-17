<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gift;
use App\Models\Invite;
use Psr\Log\LoggerInterface;
use App\Http\Controllers\Controller;
use App\Repositories\GiftRepository;
use Illuminate\Support\Facades\View;
use App\Repositories\InviteRepository;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\Invites\AddInvitesRequest;

class InviteController extends Controller
{
    private $inviteRepository;
    private $giftRepository;
    private $logger;

    public function __construct(
        InviteRepository $inviteRepository,
        GiftRepository $giftRepository,
        LoggerInterface $logger
    ) {
        $this->inviteRepository = $inviteRepository;
        $this->giftRepository = $giftRepository;
        $this->logger = $logger;
    }

    public function list()
    {
        $invites = Invite::query()->orderBy('used_at', 'desc')->orderBy('id')->paginate(50);
        $inviteIds = array_column($invites->all(), 'id');
        $gifts = $this->giftRepository->findAllWithInviteIds($inviteIds);

        foreach ($invites as $invite) {
            $filtered = array_values(array_filter($gifts, function (Gift $gift) use ($invite) {
                return (int)$gift->invite_id === (int)$invite->id;
            }));
            $invite->gift = $filtered[0] ?? null;
        }

        return View::make('admin.invite.list')
            ->with('invites', $invites);
    }

    public function addInvites(AddInvitesRequest $request)
    {
        $codes = $request->getInviteCodes();
        $isVip = $request->getIsVip();

        try {
            $this->inviteRepository->createInvites($codes, $isVip);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            return View::make('admin.invite.form')->with('error', $e->getMessage());
        }

        return redirect()->route('admin-invite-list');
    }

    public function delete(DeleteRequest $request)
    {
        try {
            $this->inviteRepository->deleteById($request->getId());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            return redirect()->route('admin-invite-list', ['error' => 'Внутренняя ошибка']);
        }

        return redirect()->route('admin-invite-list');
    }
}
