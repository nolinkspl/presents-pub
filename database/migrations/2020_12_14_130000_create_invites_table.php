<?php

use App\Models\Invite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Invite::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->boolean('is_vip')->default(false);
            $table->timestamps();
            $table->timestamp('used_at')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Invite::TABLE_NAME);
    }
}
