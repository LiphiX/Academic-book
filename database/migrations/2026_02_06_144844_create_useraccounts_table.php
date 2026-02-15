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
        Schema::create('useraccounts', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->string('login', 75);
            $table->string('password'. 75);

            $table->integer('person_id')->unsigned();

            $table->foreign('person_id')->references('id')->on('people');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useraccounts');
    }
};
