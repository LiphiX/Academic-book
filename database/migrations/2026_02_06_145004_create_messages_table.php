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
        Schema::create('messages', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');

            $table->integer('sender_id')->unsigned()->nullable();
            $table->datetime('sendDate');
            $table->text('content');
            $table->boolean('isRead')->default(false);
            $table->integer('chat_id')->unsigned();

            $table->foreign('sender_id')->references('id')->on('useraccounts')->onDelete('set null');
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
