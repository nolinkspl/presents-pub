<?php

use App\Models\MailgunMail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailgunMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(MailgunMail::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invite_id')->nullable();
            $table->string('mail_uid');
            $table->longText('message');
            $table->timestamps();
            $table
                ->foreign('invite_id', 'fk_mailgun_mail_invite_id')
                ->references('id')
                ->on('invites')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(MailgunMail::TABLE_NAME);
    }
}
