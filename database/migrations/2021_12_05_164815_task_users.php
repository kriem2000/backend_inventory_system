<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_users', function (Blueprint $table) {
            $table->id();

            /**
             * Start of foreign keys
             */
            $table->foreignId('inventory_destination_id')->constrained(table:'inventory_destinations')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreignId('inventory_group_id')->constrained(table:'inventory_group')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreignId('user_id')->constrained(table:'users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            /**
             * End of foreign keys
            */

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
        Schema::dropIfExists('task_users');
    }
}
