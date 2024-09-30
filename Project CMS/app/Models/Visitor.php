<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model {
    use HasFactory;

    public $table = 'visitors';

    protected $fillable = [
        'ip', 'data_access', 'page'
    ];
}
