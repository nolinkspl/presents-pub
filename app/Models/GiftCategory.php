<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GiftCategory
 * @package App\Models
 *
 * @property string $name
 * @property bool $is_vip
 * @property string $description
 */
class GiftCategory extends Model
{
    const TABLE_NAME = 'gift_categories';

    protected $table = self::TABLE_NAME;

    /**
     * @return GiftType[]
     */
    public function giftTypes(): array
    {
        return $this->belongsToMany(
            GiftType::class,
            GiftCategoryType::class
        )->get()->all();
    }
}
