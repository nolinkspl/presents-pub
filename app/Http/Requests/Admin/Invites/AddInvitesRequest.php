<?php

namespace App\Http\Requests\Admin\Invites;

use App\Http\Requests\Request;


class AddInvitesRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'codes' => 'string|required',
            'is_vip' => 'boolean|required',
        ];
    }

    public function getInviteCodes(): array
    {
        $rawInvites = explode(',', $this->post('codes'));
        $invites = [];
        foreach ($rawInvites as $inviteStr) {
            $inviteStr = trim($inviteStr);
            if (preg_match('/^[a-zA-Z0-9]{4,40}$/', $inviteStr) === 0) {
                continue;
            }
            $invites[] = $inviteStr;
        }

        return array_unique($invites);
    }

    public function getIsVip(): bool
    {
        return (bool)$this->post('is_vip');
    }
}
