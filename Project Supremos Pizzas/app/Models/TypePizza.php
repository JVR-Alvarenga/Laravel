<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\DataBase\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Pizza;

class TypePizza extends Model {
    use HasFactory;

    public $table = 'type_pizzas';

    protected $fillable = [
        'name', 'user_id'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongTo(User::class);
    }
    public function pizzas() {
        return $this->hasMany(Pizza::class);
    }
}
