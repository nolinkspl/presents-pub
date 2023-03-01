<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailgunEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("mailgun_events", function (Blueprint $table) {
            $table->increments('id');
            $table->string('event');
            $table->string('external_id');
            $table->timestamp('timestamp');
            $table->string('event_date');
            $table->text('tags');
            $table->text('url');
            $table->text('severity');

            $table->text('envelope_targets');
            $table->string('envelope_transport');
            $table->string('envelope_sender');

            $table->text('delivery_status'); //join
            $table->text('campaign'); //join
            $table->string('ip');
            $table->text('client_info'); //join
            $table->text('reason');
            $table->text('user_variables'); //join

            $table->text('from');
            $table->string('message_id');
            $table->text('subject');
            $table->text('to');
            $table->integer('size');
            $table->text('repicient');

            $table->timestamps();

            $table
                ->foreign('message_id', 'fk_mailgun_events_message_id')
                ->references('mail_uid')
                ->on('mailgun_mails')
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
        Schema::dropIfExists('mailgun_events');
    }
}
