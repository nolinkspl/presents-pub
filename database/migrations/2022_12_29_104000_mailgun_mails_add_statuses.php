<?php

use App\Models\MailgunMail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailgunMailsAddStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(MailgunMail::TABLE_NAME, function (Blueprint $table) {
            $table->string('status')->default('created');
            $table->index('status', 'mailgun_mails_status_idx');
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
            $table->dropIndex('mailgun_mails_status_idx');
            $table->dropColumn('status');
        });
    }
}
