<?php

namespace App\Http\Requests\Admin\Invites;

use App\Http\Requests\Request;

class GetListRequest extends Request
{
    public function error(): ?string
    {
        return $this->get('error');
    }
}
