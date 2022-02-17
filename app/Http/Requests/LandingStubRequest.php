<?php

namespace App\Http\Requests;

class LandingStubRequest extends Request
{
    public function getLandingName(): string
    {
        return $this->route('landing');
    }
}
