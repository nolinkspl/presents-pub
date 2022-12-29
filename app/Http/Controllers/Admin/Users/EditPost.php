<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\Admin\Users;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\View;

class EditPost
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function __invoke(Users\GetListRequest $request)
    {
        /** @TODO */
    }
}
