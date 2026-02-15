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
        Schema::create('classnumbers', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->integer('number')->unsigned();
            $table->time('start');
            $table->time('end');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classnumbers');
    }
};
