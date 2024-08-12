<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model {
    use HasFactory;

    public $table = 'states';
    public $timestamps = false;

    protected $fillable = [
        'name', 'slug'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
