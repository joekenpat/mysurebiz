<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('users_id')->unique();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nature_of_job');
            $table->string('position_at_job');
            $table->integer('pennywise_percentage')->nullable();
            $table->tinyInteger('has_set_pennywise')->default(0);
            $table->tinyInteger('existing_business');
//            $table->integer('period');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('employees');
        Schema::enableForeignKeyConstraints();
    }
}
