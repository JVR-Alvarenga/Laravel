<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model {
    use HasFactory;

    public $table = 'categories';
    public $timestamps = false;

    protected $fillable = [
        'title', 'slug'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
