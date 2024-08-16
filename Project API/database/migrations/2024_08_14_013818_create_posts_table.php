<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\State;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('price');
            $table->boolean('isNegotiable')->default(false);
            $table->text('description')->nullable();
            $table->boolean('views')->default(false);
            $table->foreignIdFor(User::class)->references('id')->on('users');
            $table->foreignIdFor(Category::class)->references('id')->on('categories');
            $table->foreignIdFor(State::class)->references('id')->on('states');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
