<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class , 'id','user_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class , 'id','product_id');
    }
    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'tax',
        'delivery_charges',
        'quantity',
        'total',
        'status',
        'tracking_number',
        'created_at',
        'updated_at'
    ];
}
