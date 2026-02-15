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

            $table->integer('group_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('discipline_id')->unsigned();
            $table->integer('classType_id')->unsigned();
            $table->date('date');

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->foreign('classType_id')->references('id')->on('classtypes');

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
