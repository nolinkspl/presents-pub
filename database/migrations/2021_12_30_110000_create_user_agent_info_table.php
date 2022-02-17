<?php

use App\Models\GiftCategoryType;
use App\Models\AgentInfo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAgentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(AgentInfo::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invite_id')->nullable();
            $table->string('device');
            $table->string('browser');
            $table->string('platform');
            $table->string('ip_address');
            $table->string('raw');
            $table->timestamps();
            $table
                ->foreign('invite_id', 'fk_agent_invite_id')
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
        Schema::dropIfExists(AgentInfo::TABLE_NAME);
    }
}
