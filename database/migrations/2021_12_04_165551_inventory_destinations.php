<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryDestinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_destinations', function (Blueprint $table) {
            $table->id();
            
            /**
             * Start of foreign keys
             */
            $table->foreignId('destination_status_id')->constrained(table:'task_status')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('building_id')->constrained(table:'buildings')
                ->onUpdate('NO ACTION')
                ->OnDelete('NO ACTION');

            $table->foreignId('unit_id')->constrained(table:'units')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('created_by_id')->constrained(table:'users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('inventory_group_id')->constrained(table:'inventory_group')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->unsignedBigInteger('approved_by_id')->nullable();
            /**
             * End of foreign keys
             */

            $table->boolean('approved')->nullable(false);
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
        Schema::dropIfExists('inventory_destinations');
    }
}
