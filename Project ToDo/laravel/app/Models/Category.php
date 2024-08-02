<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class Category extends Model{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'title', 'color', 'user_id'
    ];

    public function user(){
        return $this->belongTo(User::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
