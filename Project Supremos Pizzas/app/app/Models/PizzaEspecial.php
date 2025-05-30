<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PizzaEspecial extends Model {

    use HasFactory;

    public $table = 'pizza_especiais';

    protected $fillable = [
        'flavor', 'description', 'price_m', 'price_g'
    ];

    public $timestamps = false;
}
