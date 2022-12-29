<?php

use App\Models\MailgunMail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailgunMailsUniqMailId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(MailgunMail::TABLE_NAME, function (Blueprint $table) {
            $table->unique('mail_uid', 'mailgun_mails_mail_uid_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(MailgunMail::TABLE_NAME, function (Blueprint $table) {
            $table->dropUnique('mailgun_mails_mail_uid_unique');
        });
    }
}
