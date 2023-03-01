<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MailgunEvent
 * @package App\Models
 *
 * @property int $id
 * @property string $event
 * @property string $external_id
 * @property int $timestamp
 * @property string $event_date
 * @property string $tags
 * @property string $url
 * @property string $severity
 * 
 * @property string $envelope_targets
 * @property string $envelope_transport
 * @property string $envelope_sender
 * 
 * @property string $delivery_status
 * @property string $campaign
 * @property string $ip
 * @property string $client_info
 * @property string $reason
 * @property string $user_variables
 * 
 * @property string $from
 * @property string $message_id
 * @property string $subject
 * @property string $to
 * @property int $size
 * @property string $repicient
 * 
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 *
 */

class MailgunEvent extends Model
{
    const TABLE_NAME = 'mailgun_events';

    protected $table = self::TABLE_NAME;
}
