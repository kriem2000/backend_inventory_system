<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_tasks', function (Blueprint $table) {
            $table->id();
            
            /**
             * Start of foreign keys
             */
            $table->foreignId('task_status_id')->constrained(table:'task_status')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
    
            $table->foreignId('unit_id')->constrained(table:'units')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('created_by_id')->constrained(table:'users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('inventory_group_id')->constrained(table:'inventory_group')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('inventory_destination_id')->constrained(table:'inventory_destinations')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            /**
             * End of foreign keys
             */
            
            $table->string('sub_unit_name');
            $table->text('sub_unit_desc');
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
        Schema::dropIfExists('inventory_tasks');
    }
}
