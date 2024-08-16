<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\State;
use App\Models\Category;

class Post extends Model {
    use HasFactory;

    public $table = 'posts';

    protected $fillable = [
        'title', 'price', 'isNegotiable', 'description', 'views',
        'user_id', 'category_id', 'state_id'
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
