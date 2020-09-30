<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('users_id')->on('admins');
            $table->string('title');
            $table->text('note')->nullable();
            $table->string('cover_image');
            $table->char('video', 200)->nullable();
            $table->text('assignment_note')->nullable();
            $table->string('assignment_doc', 191)->nullable();
            $table->index('assignment_doc');
            $table->string('url', 191)->unique();
            $table->date('start_date');
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
        Schema::dropIfExists('courses');
        Schema::enableForeignKeyConstraints();
    }
}
