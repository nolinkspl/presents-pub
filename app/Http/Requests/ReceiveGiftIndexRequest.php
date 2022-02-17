<?php

namespace App\Http\Requests;


class ReceiveGiftIndexRequest extends Request
{
    public function getInviteCode(): string
    {
        return $this->route('code');
    }
}
