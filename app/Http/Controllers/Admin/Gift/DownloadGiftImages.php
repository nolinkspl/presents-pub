<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Http\Requests\Admin\Gifts\DownloadGiftImagesRequest;

class DownloadGiftImages
{
    public function __invoke(DownloadGiftImagesRequest $request)
    {
        var_dump($request->post());die;
    }
}
