<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\Admin\Users;
use App\Models\User;
use Illuminate\Support\Facades\View;

class GetList
{
    public function __invoke(Users\GetListRequest $request)
    {
        $users = User::query()
            ->orderBy('id')
            ->paginate(10);

        $result = View::make('admin.users.list')
            ->with('users', $users);

        if (!empty($request->error())) {
            $result->with('error', $request->error());
        }

        return $result;
    }
}
