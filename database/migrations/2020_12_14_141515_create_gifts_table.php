<?php

use App\Models\Gift;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Gift::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gift_type_id');
            $table
                ->foreign('gift_type_id', 'fk_gift_type_id')
                ->references('id')
                ->on('gift_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('code')->nullable();
            $table->string('pin')->nullable();

            $table->unsignedInteger('invite_id')->nullable();

            $table
                ->foreign('invite_id', 'fk_invite_id')
                ->references('id')
                ->on('invites')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->timestamp('used_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Gift::TABLE_NAME);
    }
}
