<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    public $table = 'categories';
    public $timestamps = false;

    protected $fillable = [
        'name', 'slug'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
