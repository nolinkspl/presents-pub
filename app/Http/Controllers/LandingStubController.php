<?php

namespace App\Http\Controllers;

use App\Http\Requests\LandingStubRequest;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\View;

class LandingStubController
{
    public function __invoke(LandingStubRequest $request)
    {
        if (Browser::isIE()) {
            return View::make('stun');
        }

        return view("landings.{$request->getLandingName()}.stub");
    }
}
