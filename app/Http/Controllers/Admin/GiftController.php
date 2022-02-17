<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GiftsExport;
use App\Models\Gift;
use App\Models\Invite;
use Psr\Log\LoggerInterface;
use App\Http\Controllers\Controller;
use App\Repositories\GiftRepository;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\InviteRepository;
use App\Repositories\GiftTypeRepository;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\Invites\GetListRequest;
use App\Http\Requests\Admin\Invites\AddGiftsRequest;

class GiftController extends Controller
{
    private $giftRepository;
    private $giftTypeRepository;
    private $inviteRepository;
    private $logger;

    public function __construct(
        GiftRepository $giftRepository,
        GiftTypeRepository $giftTypeRepository,
        InviteRepository $inviteRepository,
        LoggerInterface $logger
    ) {
        $this->giftRepository = $giftRepository;
        $this->giftTypeRepository = $giftTypeRepository;
        $this->inviteRepository = $inviteRepository;
        $this->logger = $logger;
    }

    public function list(GetListRequest $request)
    {
        $gifts = Gift::orderBy('used_at')->orderBy('id')->paginate(50);
        $invites = $this->inviteRepository->findAllUsed();
        $types = $this->giftTypeRepository->getGiftTypesIndexedById();

        foreach ($gifts as $gift) {
            $gift->type = $types[$gift->gift_type_id];
            $gift->invite = array_values(array_filter($invites, function (Invite $invite) use ($gift) {
                return $gift->invite_id === $invite->id;
            }))[0] ?? null;
        }

        $result = View::make('admin.gift.list')
        ->with('gifts', $gifts);

        if (!empty($request->error())) {
            $result->with('error', $request->error());
        }

        return $result;
    }

    public function form()
    {
        return view('admin.gift.form')
            ->with('giftTypes', $this->giftTypeRepository->getGiftTypesList());
    }

    public function addGifts(AddGiftsRequest $request)
    {
        try {
            $this->giftRepository->createGifts($request->getGiftCodesWithPins(), $request->getTypeId());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            return View::make('admin.gift.form')
                ->with('giftTypes', $this->giftTypeRepository->getGiftTypesList())
                ->with('error', $e->getMessage());
        }

        return redirect()->route('admin-gift-list');
    }

    public function delete(DeleteRequest $request)
    {
        try {
            $this->giftRepository->deleteById($request->getId());
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            return redirect()->route('admin-gift-list', ['error' => 'Внутренняя ошибка']);
        }

        return redirect()->route('admin-gift-list');
    }

    public function stats()
    {
        $gifts = $this->giftRepository->getAll();
        $typeNames = $this->giftTypeRepository->getGiftTypeNamesIndexedById();
        $usedByType = [];
        $unusedByType = [];
        $totalByType = [];

        foreach ($typeNames as $typeName) {
            $usedByType[$typeName] = 0;
            $unusedByType[$typeName] = 0;
            $totalByType[$typeName] = 0;
        }

        foreach ($gifts as $gift) {
            $typeName = $typeNames[$gift->gift_type_id];
            if ($gift->isUsed()) {
                $usedByType[$typeName]++;
            } else {
                $unusedByType[$typeName]++;
            }

            $totalByType[$typeName]++;
        }

        return View::make('admin.gift.stats')
            ->with('usedByType', $usedByType)
            ->with('unusedByType', $unusedByType)
            ->with('totalByType', $totalByType)
            ->with('typeNames', $typeNames);
    }
}
