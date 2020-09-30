<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbookSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebook_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string("ref")->nullable();
            $table->unsignedBigInteger('ebook_id');
            $table->string("email");
            $table->string("name");
            $table->unsignedBigInteger('price');
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('ebook_sales');
    }
}
