<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailattachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailattachements', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('mail_id');
	        $table->foreign('mail_id')->references('id')->on('mails')
		        ->onDelete('cascade');
	        $table->char('attachment', 255);
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
        Schema::dropIfExists('mailattachements');
    }
}
