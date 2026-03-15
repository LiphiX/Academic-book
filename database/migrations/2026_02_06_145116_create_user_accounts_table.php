<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->string('login', 75);
            $table->string('password', 75);

            $table->integer('person_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_accounts');
    }
};
