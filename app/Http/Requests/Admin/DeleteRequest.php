<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;


class DeleteRequest extends Request
{
    public function rules(): array
    {
        return [
            'id' => 'int|required',
        ];
    }

    public function getId(): int
    {
        return (int)$this->get('id');
    }
}
