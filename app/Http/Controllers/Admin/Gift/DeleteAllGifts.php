<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Repositories\GiftRepository;

class DeleteAllGifts
{
    private $giftRepo;

    public function __construct(GiftRepository $giftRepo)
    {
        $this->giftRepo = $giftRepo;
    }

    public function __invoke()
    {
        $this->giftRepo->deleteAll();

        return redirect()->route('admin-gift-list');
    }
}
