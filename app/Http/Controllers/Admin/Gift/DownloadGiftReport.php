<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Exports\GiftsExport;
use App\Http\Requests\Admin\ReportDownloadRequest;
use App\Models\Gift;
use App\Repositories\GiftTypeRepository;
use App\Repositories\InviteRepository;
use Maatwebsite\Excel\Facades\Excel;

class DownloadGiftReport
{
    private $inviteRepo;
    private $giftTypeRepo;

    public function __construct(InviteRepository $inviteRepo, GiftTypeRepository $giftTypeRepo)
    {
        $this->inviteRepo = $inviteRepo;
        $this->giftTypeRepo = $giftTypeRepo;
    }

    public function __invoke(ReportDownloadRequest $request)
    {
        $giftCollection = Gift::orderBy('used_at')->orderBy('id')->get();
        $inviteIds = array_column($giftCollection->all(), 'invite_id');
        $invites = $this->inviteRepo->findAllByIds($inviteIds);
        $format = $request->getReportFormat();

        return Excel::download(
            new GiftsExport(
                $giftCollection,
                $invites,
                $this->giftTypeRepo->findAll()
            ),
            'gifts.' . strtolower($format),
            $format
        );
    }
}
