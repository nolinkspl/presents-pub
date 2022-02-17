<?php

namespace App\Http\Requests\Admin\Invites;

use App\Http\Requests\Request;


class AddGiftsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'codes' => 'string|required',
            'type_id' => 'int|required',
        ];
    }

    /**
     * @return string[]
     */
    public function getGiftCodesWithPins(): array
    {
        $raw = explode(',', $this->post('codes'));
        $result = [];

        foreach ($raw as $code) {
            $giftCode = trim($code);
            if (preg_match('/^[a-zA-Z0-9\-]{4,40}$/', $giftCode) === 0) {
                continue;
            }
            $result[] = $giftCode;
        }

        return $result;
    }

    public function getTypeId(): int
    {
        return (int)$this->post('type_id');
    }
}
