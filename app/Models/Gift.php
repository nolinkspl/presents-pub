<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Gift
 * @package App\Models
 * @property int $id
 * @property int $gift_type_id
 * @property string $code
 * @property string $pin
 * @property int $invite_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $used_at
 * @property Invite $invite
 */
class Gift extends Model
{
    const TABLE_NAME = 'gifts';

    protected $table = self::TABLE_NAME;

    public $invite;
    public $type;

    public function getCode(): string
    {
        return $this->code;
    }

    public function switchToUsed(): void
    {
        $this->used_at = date('Y-m-d H:i:s');
    }

    public function getType(): GiftType
    {
        if (empty($this->type)) {
            return $this->hasOne(GiftType::class, 'id', 'gift_type_id')->first();
        }

        return $this->type;
    }

    public function getInviteInfo(): string
    {
        if ($this->invite_id === null) {
            return '';
        }

        if ($this->invite === null) {
            $this->invite = $this->hasOne(Invite::class, 'id', 'invite_id')->first();
        }

        if ($this->invite === null) {
            return '';
        }

        return "{$this->invite->id}. {$this->invite->code}";
    }

    public function getPin(): string
    {
        return $this->pin ?: '';
    }

    public function isUsed(): bool
    {
        return !empty($this->used_at);
    }

    public function getPic(): ?string
    {
        try {
            $path = 'gifts/' . $this->code . '.jpg';
            return Storage::get($path);
        } catch (FileNotFoundException $e) {
            return null;
        }
    }

    public function getHtmlPic(): string
    {
        $pic = $this->getPic();
        if ($pic === null) {
            return $this->code;
        }
        return '<img style="object-fit: cover; max-height: 600px; max-width: 400px; margin: 0 auto;" src="data:image/jpg;base64,'
            . base64_encode($pic) . '" alt="code">';
    }
}
