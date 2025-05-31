<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\DataBase\Eloquent\Factories\HasFactory;

class Pizza extends Model {
    use HasFactory;

    public $table = 'pizzas';

    protected $fillable = [
        'flavor', 'type', 'description', 'price_m', 'price_g'
    ];

    public $timestamps = false;
}
