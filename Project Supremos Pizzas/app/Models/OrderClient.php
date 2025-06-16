<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderClient extends Model {
    use HasFactory;

    public $table = 'order_clients';

    protected $fillable = [
        'order', 'quantity_itens', 'price', 'user_id', 'address', 'cep_address', 'complement_address',
        'name_client', 'telephone', 'type_delivery', 'payment_method', 'date_hour_order', 'observations'
    ];

    public $timestamps = false;
}
