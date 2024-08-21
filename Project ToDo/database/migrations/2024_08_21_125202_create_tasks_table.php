<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Category;

return new class extends Migration{
    public function up(): void {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_done')->default(false);
            $table->string('title')->nullable(false);
            $table->string('description')->nullable();
            $table->dateTime('due_date');
            $table->foreignIdFor(User::class)
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreignIdFor(Category::class)
                ->references('id')
                ->on('categories')
                ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tasks');
    }
};
