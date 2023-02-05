<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            /**
             * Start of foreign keys
             */
            $table->foreignId('category_id')->constrained(table:'item_categories')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreignId('user_id')->constrained(table:'users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreignId('status_id')->constrained(table:'item_status')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreignId('inventory_group_id')->constrained(table:'inventory_group')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->unsignedBigInteger('inventory_task_id')->nullable();
            /*
             * End of foreign keys
             */

            $table->string('item_name');
            $table->integer('quantity');
            $table->text('item_note')->nullable();
            $table->string('item_owner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
