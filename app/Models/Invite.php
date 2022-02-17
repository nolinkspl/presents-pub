<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Invite
 * @package App\Models
 * @property int $id
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 * @property string $used_at
 * @property bool $is_vip
 * @property string $email
 * @property Gift $gift
 * @property AgentInfo $agent
 */
class Invite extends Model
{
    const TABLE_NAME = 'invites';

    public $gift;

    protected $table = self::TABLE_NAME;

    public function getCode(): string
    {
        return $this->code;
    }

    public function isUsed(): bool
    {
        return $this->used_at !== null;
    }

    public function switchToUsed(): void
    {
        $this->used_at = date('Y-m-d H:i:s');
    }

    public function getGiftCode(): string
    {
        if ($this->gift === null) {
            return '';
        }

        return $this->gift->code;
    }

    public function isVip(): string
    {
        return $this->is_vip ? 'Да' : 'Нет';
    }
}
