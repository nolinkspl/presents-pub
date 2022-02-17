<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GiftCategoryType
 * @package App\Models
 *
 * @property $gift_category_id
 * @property $gift_type_id
 */
class GiftCategoryType extends Model
{
    const TABLE_NAME = 'gift_category_type';

    protected $table = self::TABLE_NAME;
}
