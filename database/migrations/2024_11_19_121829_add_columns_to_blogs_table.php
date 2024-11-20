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
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('description')->after('title');
            $table->string('categories')->after('body');
            $table->string('author')->after('body');
            $table->string('url_slug')->after('banner')->unique();
            $table->tinyInteger('is_featured')->after('status')->default(0);
            $table->dateTime('published_at')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
};
