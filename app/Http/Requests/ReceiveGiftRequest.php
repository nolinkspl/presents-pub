<?php

namespace App\Http\Requests;


class ReceiveGiftRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'string|required',
            //'service' => 'string|required',
            'gift_type_id' => 'int|required',
        ];
    }

    public function getEmail(): string
    {
        return $this->post('email');
    }

    public function getGiftTypeId(): int
    {
        return (int)$this->post('gift_type_id');
    }

    public function getInviteCode(): string
    {
        return $this->route('code');
    }
}
