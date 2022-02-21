<?php

namespace App\Http\Controllers\Admin\GiftType;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GiftType\GiftTypeSaveRequest;
use App\Models\GiftType;
use App\Repositories\GiftTypeRepository;
use Illuminate\Support\Facades\View;

class GiftTypeSave extends Controller
{
    /** @var GiftTypeRepository $giftTypeRepo */
    private $giftTypeRepo;

    public function __construct(GiftTypeRepository $giftTypeRepo)
    {
        $this->giftTypeRepo = $giftTypeRepo;
    }

    public function __invoke(GiftTypeSaveRequest $request)
    {
        $giftType = $this->giftTypeRepo->findById($request->getId());
        if ($giftType === null) {
            $giftType = new GiftType();
        }
        $this->giftTypeRepo->save($giftType, $request);

        return View::make('admin.gift-type.list')
            ->with('giftTypes', GiftType::orderBy('id')->paginate(20));
    }
}
