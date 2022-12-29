<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AgentInfo
 * @package App\Models
 *
 * @property int $id
 * @property int $invite_id
 * @property string $mail_uid
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 *
 *
 */
class MailgunMail extends Model
{
    const TABLE_NAME = 'mailgun_mails';

    protected $table = self::TABLE_NAME;
}
