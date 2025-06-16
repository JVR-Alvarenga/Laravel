<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_clients', function (Blueprint $table) {
            $table->id();
            $table->text('order');
            $table->integer('quantity_itens');
            $table->double('price');
            $table->foreignIdFor(User::class)->constrained();
            $table->string('address');
            $table->integer('cep_address');
            $table->string('complement_address')->nullable(true);
            $table->string('name_client');
            $table->string('telephone');
            $table->string('type_delivery');
            $table->string('payment_method');
            $table->dateTime('date_hour_order');
            $table->text('observations')->nullable(true);
        });
    }

    public function down(): void {
        Schema::dropIfExists('order_clients');
    }
};
