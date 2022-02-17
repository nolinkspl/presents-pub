<?php

namespace App\Http\Requests\Admin\GiftType;

use App\Http\Requests\Request;


class GiftTypeSaveRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'title' => 'string|required',
            'description' => 'string|required',
            'cost' => 'int|required',

        ];
    }

    public function getId(): int
    {
        return (int)$this->get('id');
    }

    public function getName(): string
    {
        return $this->get('name');

    }

    public function getTitle(): string
    {
        return $this->get('title');
    }

    public function getDescription(): string
    {
        return $this->get('description');
    }

    public function getCost(): int
    {
        return (int)$this->get('cost');
    }

    public function getVip(): bool
    {
        return (bool)$this->get('is_vip');
    }

}
