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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->string('first_name')->after('name');
            $table->string('address')->after('email')->nullable();
            $table->string('contact_number')->after('email')->nullable();
            $table->date('birthdate')->after('email')->nullable();

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->dropColumn('address');
            $table->dropColumn('contact_number');
            $table->dropColumn('birthdate');

            $table->string('name')->after('id');
        });
    }
};
