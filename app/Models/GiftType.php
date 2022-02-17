<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GiftType
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property bool $is_vip
 * @property string $description_head
 * @property string $description
 * @property int cost
 */
class GiftType extends Model
{
    const YANDEX_TYPE = 'yandex';
    const SPOTIFY_TYPE = 'spotify';

    const TABLE_NAME = 'gift_types';

    protected $table = self::TABLE_NAME;

    public function getTypeListName(): string
    {
        return "{$this->id}. {$this->title} ({$this->name})";
    }
}
