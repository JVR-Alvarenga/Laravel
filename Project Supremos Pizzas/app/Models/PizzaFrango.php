<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PizzaFrango extends Model {
    use HasFactory;

    public $table = 'pizza_frangos';

    protected $fillable = [
        'flavor', 'price_m', 'price_g'
    ];

    public $timestamps = false;
    
}
