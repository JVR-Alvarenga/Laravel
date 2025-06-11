<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Drink extends Model {

    public $table = 'drinks';

    public $timestamps = false;

    protected $fillable = [
        'name', 'volume', 'price', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
