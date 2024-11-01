<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('city_weather', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp_dt');
            $table->string('city_name');
            $table->float('min_tmp', 2);
            $table->float('max_tmp', 2);
            $table->float('wind_spd', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_weather');
    }
};
