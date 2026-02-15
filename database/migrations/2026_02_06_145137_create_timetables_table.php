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
        Schema::create('timetables', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->integer('classNumber_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('discipline_id')->unsigned();

            $table->integer('dayOfWeek')->unsigned();

            $table->foreign('classNumber_id')->references('id')->on('classNumbers');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('discipline_id')->references('id')->on('disciplines');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE timetables add CONSTRAINT chk_dayofweek_range CHECK (dayOfWeek >= 1 AND dayOfWeek <= 6);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
        DB::statement('ALTER TABLE timetables drop CONSTRAINT if exists chk_dayofweek_range');
    }
};
