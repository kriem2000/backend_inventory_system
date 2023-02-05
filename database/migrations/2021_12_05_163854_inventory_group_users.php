<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryGroupUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_group_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_group_id')->constrained(table:'inventory_group')
                ->onDelete("NO ACTION")
                ->onUpdate("NO ACTION");
            $table->foreignId('user_id')->constrained(table:'users')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
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
        Schema::dropIfExists('inventory_group_users');
    }
}
