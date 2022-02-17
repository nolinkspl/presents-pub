<?php

namespace App\Http\Controllers\Admin\GiftType;

use App\Http\Controllers\Controller;
use App\Models\GiftType;
use App\Repositories\GiftTypeRepository;
use Illuminate\Support\Facades\View;

class GiftTypeList extends Controller
{
    private $giftTypeRepo;

    public function __construct(GiftTypeRepository $giftTypeRepo)
    {
        $this->giftTypeRepo = $giftTypeRepo;
    }

    public function __invoke()
    {
        return View::make('admin.gift-type.list')
            ->with('giftTypes', GiftType::orderBy('id')->paginate(20));
    }
}
