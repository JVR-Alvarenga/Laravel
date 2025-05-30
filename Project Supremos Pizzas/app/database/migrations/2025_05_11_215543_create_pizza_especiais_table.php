<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pizza_especiais', function (Blueprint $table) {
            $table->id();
            $table->string('flavor');
            $table->text('description');
            $table->double('price_m');
            $table->double('price_g');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pizza_especiais');
    }
};
