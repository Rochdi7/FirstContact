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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();

            $table->string('code', 3)->unique(); // ISO Code (e.g., USD, EUR)
            $table->string('symbol', 10); // Currency symbol (e.g., $, €, ¥)
            $table->decimal('exchange_rate', 16, 4)->default(1.0000); // Exchange rate to base currency (e.g., 1.000000 for USD)

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
