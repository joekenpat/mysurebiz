<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('users_id')->unique();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name_of_school');
            $table->string('state_of_school', 30);
//            $table->integer('level');
            $table->string('course');
//            $table->string('pennywise_category');
            $table->string('parent_guardian_phone', 11)->nullable();
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
        Schema::dropIfExists('students');
        Schema::enableForeignKeyConstraints();
    }
}
