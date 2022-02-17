<?php

use App\Models\GiftCategoryType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCategoryTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(GiftCategoryType::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedInteger('gift_category_id');
            $table->unsignedInteger('gift_type_id');
            $table->timestamps();
            $table
                ->foreign('gift_category_id', 'fk_gift_category_id')
                ->references('id')
                ->on('gift_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('gift_type_id', 'fk2_gift_type_id')
                ->references('id')
                ->on('gift_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['gift_category_id', 'gift_type_id'], 'uniq_category_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(GiftCategoryType::TABLE_NAME);
    }
}
