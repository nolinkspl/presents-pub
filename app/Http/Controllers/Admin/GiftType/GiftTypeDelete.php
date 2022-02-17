<?php

namespace App\Http\Controllers\Admin\GiftType;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteRequest;
use App\Repositories\GiftTypeRepository;

class GiftTypeDelete extends Controller
{
    /** @var GiftTypeRepository $giftTypeRepo */
    private $giftTypeRepo;
    public function __construct(GiftTypeRepository $giftTypeRepo)
    {
        $this->giftTypeRepo = $giftTypeRepo;
    }

    public function __invoke(DeleteRequest $request)
    {

    }
}
