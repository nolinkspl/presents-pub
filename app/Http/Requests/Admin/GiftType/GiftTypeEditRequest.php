<?php

namespace App\Http\Requests\Admin\GiftType;

use App\Http\Requests\Request;


class GiftTypeEditRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'int',
        ];
    }

    public function getId(): int
    {
        return (int)$this->get('id');
    }
}
