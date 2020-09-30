<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_audiences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mail_id');
            $table->foreign('mail_id')->references('id')->on('mails')
	            ->onDelete('cascade');
            $table->unsignedInteger('period');
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
        Schema::dropIfExists('mail_audiences');
    }
}
