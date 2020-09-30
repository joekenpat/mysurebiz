<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->char('email', 191)->unique();
            $table->string('home_address');
            $table->date('dob');
            $table->char('state_of_origin', 30);
            $table->string('phone', 11);
            $table->string('name_next_of_kin');
            $table->string('phone_next_of_kin', 11);
            $table->char('state_next_of_kin', 30)->nullable();
            $table->unsignedInteger('business_category_id');
            $table->foreign('business_category_id')->references('id')->on('business_categories');
            $table->string('business_of_interest')->nullable();
            $table->integer('period');
            $table->integer('pennywise')->nullable();
            $table->string('resident_state', 30)->nullable();
            $table->string('gender', 6);
            $table->string('image')->nullable();
            $table->tinyInteger('role');
            $table->tinyInteger('status')->default(0);
            $table->double('balance')->default(0);
            $table->char('authorization_code', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_code');
            $table->char('ref_code', 20)->unique();
            $table->char('ref_by', 191)->nullable()->index();
            $table->double('ref_bonus')->default(0);
            $table->unsignedInteger('batch_id');
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
