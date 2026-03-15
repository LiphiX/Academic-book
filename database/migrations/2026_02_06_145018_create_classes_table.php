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
        Schema::create('classes', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->integer('timetable_id')->unsigned();

            $table->boolean('is_cancelled')->default(false);
            $table->date('date');

            $table->foreign('timetable_id')->references('id')->on('timetables');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
