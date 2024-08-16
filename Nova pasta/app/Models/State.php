<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class State extends Model {
    use HasFactory;
    
    public $table = 'states';
    public $timestamps = false;

    protected $fillable = [
        'title', 'slug'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
