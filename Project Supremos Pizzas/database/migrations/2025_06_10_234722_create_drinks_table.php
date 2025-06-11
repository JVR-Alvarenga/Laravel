<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    public function up(): void {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('volume');
            $table->double('price');
            $table->foreignIdFor(User::class)->constrained();
        });
    }

    public function down(): void {
        Schema::dropIfExists('drinks');
    }
};
