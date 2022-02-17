<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AgentInfo
 * @package App\Models
 *
 * @property int $id
 * @property int $invite_id
 * @property string $device
 * @property string $browser
 * @property string $platform
 * @property string $ip_address
 * @property string $raw
 */
class AgentInfo extends Model
{
    const TABLE_NAME = 'agent_info';

    protected $table = self::TABLE_NAME;
}
