<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Pizza;
use App\Models\TypePizza;
use App\Models\Drink;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    public $table = 'users';
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function typePizzas() {
        return $this->hasMany(TypePizza::class);
    }
    public function pizzas() {
        return $this->hasMany(Pizza::class);
    }
    public function drinks() {
        return $this->hasMany(Drink::class);
    }
}
