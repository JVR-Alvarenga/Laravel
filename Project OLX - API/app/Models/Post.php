<?php

namespace App\Models;

use App\Models\User;
use App\Models\State;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    public $table = 'posts';

    protected $fillable = [
        'title', 'price', 'isNegotiable', 'description', 
        'category_id', 'user_id', 'state_id', 'views'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
