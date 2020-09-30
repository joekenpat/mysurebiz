<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseBusinessCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_business_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')
                ->onDelete('cascade');
            $table->unsignedInteger('business_category_id');
            $table->foreign('business_category_id')->references('id')->on('business_categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('course_business_categories');
        Schema::enableForeignKeyConstraints();
    }
}
