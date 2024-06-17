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
            $table->text('gmaps_address')->nullable()->after('contact_number');
            $table->string('street')->nullable()->after('contact_number');
            $table->unsignedBigInteger('barangay_id')->default(0)->after('contact_number');
            $table->unsignedBigInteger('city_id')->default(0)->after('contact_number');
            $table->unsignedBigInteger('province_id')->default(0)->after('contact_number');
            $table->unsignedBigInteger('region_id')->default(0)->after('contact_number');
            $table->string('country')->nullable()->after('contact_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gmaps_address');
            $table->dropColumn('street');
            $table->dropColumn('barangay_id');
            $table->dropColumn('city_id');
            $table->dropColumn('province_id');
            $table->dropColumn('region_id');
            $table->dropColumn('country');
        });
    }
};
