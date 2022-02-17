<?php

namespace App\Http\Controllers\Admin\Invite;

use App\Exports\InvitesExport;
use App\Http\Requests\Admin\ReportDownloadRequest;
use App\Models\Invite;
use App\Repositories\AgentRepository;
use App\Repositories\GiftRepository;
use Maatwebsite\Excel\Facades\Excel;

class DownloadInviteReport
{
    private $giftRepo;
    private $agentRepo;

    public function __construct(GiftRepository $giftRepo, AgentRepository $agentRepo)
    {
        $this->giftRepo = $giftRepo;
        $this->agentRepo = $agentRepo;
    }

    public function __invoke(ReportDownloadRequest $request)
    {
        $inviteCollection = Invite::query()->orderBy('used_at', 'desc')->orderBy('id')->get();
        $inviteIds = array_column($inviteCollection->all(), 'id');
        $gifts = $this->giftRepo->findAllWithInviteIds($inviteIds);
        $agents = $this->agentRepo->getAll();
        $format = $request->getReportFormat();

        return Excel::download(
            new InvitesExport(
                $inviteCollection,
                $gifts,
                $agents
            ),
            'invites.' . strtolower($format),
            $format
        );
    }
}
