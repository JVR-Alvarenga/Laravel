<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration{
    public function up(){
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('color')->default('#FFF');
            $table->foreignIdFor(User::class)
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->timestamps();
        });
    }


    public function down(){
        Schema::table('categories', function (Blueprint $table){
            $table->dropForeignIdFor(User::class);
        });
        Schema::dropIfExists('categories');
    }
};
