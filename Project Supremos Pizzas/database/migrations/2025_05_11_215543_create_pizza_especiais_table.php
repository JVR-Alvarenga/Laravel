<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pizza_especiais', function (Blueprint $table) {
            $table->id();
            $table->string('sabor');
            $table->float('price_m')->default(0.00);
            $table->float('price_g')->default(0.00);
        });
    }

    public function down(): void {
        Schema::dropIfExists('pizza_especials');
    }
};
