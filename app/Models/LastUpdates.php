<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LastUpdates
 * @package App\Models
 *
 * @property string $name
 * @property \Datetime $last_updated_at
 *
 *
 */
class LastUpdates extends Model
{
    const TABLE_NAME = 'last_updates';

    protected $table = self::TABLE_NAME;
}
