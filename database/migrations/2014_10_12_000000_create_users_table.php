<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dob')->nullable();
            $table->string('role');
            $table->string('gender')->nullable();
            $table->string('income')->nullable();
            $table->string('occupation')->nullable();
            $table->string('family_type')->nullable();
            $table->string('manglik')->nullable();
            $table->string('partner_income_range')->nullable();
            $table->string('partner_occupation')->nullable();
            $table->string('partner_family_type')->nullable();
            $table->string('partner_manglik')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('users');
    }
};
