<?php

namespace App\Http\Controllers\Admin\GiftType;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GiftType\GiftTypeEditRequest;
use App\Models\GiftType;
use App\Repositories\GiftTypeRepository;
use Illuminate\Support\Facades\View;

class GiftTypeEdit extends Controller
{
    private $giftTypeRepo;

    public function __construct(GiftTypeRepository $giftTypeRepo)
    {
        $this->giftTypeRepo = $giftTypeRepo;
    }

    public function __invoke(GiftTypeEditRequest $request)
    {
        $giftType = $this->giftTypeRepo->findById($request->getId());
        if ($giftType === null) {
            $giftType = new GiftType();
        }
        return View::make('admin.gift-type.form')
            ->with('giftType', $giftType);
    }
}
