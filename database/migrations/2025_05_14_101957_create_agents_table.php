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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('address');
            $table->string('name');
            $table->text('bio')->nullable();
            $table->text('lore')->nullable();
            $table->text('topics')->nullable();
            $table->text('adjectives')->nullable();
            $table->text('style_all')->nullable();
            $table->text('style_chat')->nullable();
            $table->text('style_post')->nullable();
            $table->string('twitter_email')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('twitter_password')->nullable();
            $table->string('twitter_2fa')->nullable();
            $table->string('twitter_agent_id')->nullable();
            $table->string('telegram_bot_token')->nullable();
            $table->string('telegram_chat_id')->nullable();
            $table->string('telegram_agent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
