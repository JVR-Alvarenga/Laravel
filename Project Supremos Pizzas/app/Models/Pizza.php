<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\DataBase\Eloquent\Factories\HasFactory;
use App\Models\TypePizza;
use App\Models\User;

class Pizza extends Model {
    use HasFactory;

    public $table = 'pizzas';

    protected $fillable = [
        'flavor', 'description', 'user_id', 'type_pizza_id', 'price_m', 'price_g'
    ];

    public $timestamps = false;
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function typePizza() {
        return $this->belongsTo(TypePizza::class);
    }
}
