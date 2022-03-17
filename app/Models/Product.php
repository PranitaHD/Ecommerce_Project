<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function secret()
    {
        return $this->hasOne(Secret::class , 'id','secret_code');
    }
    // public function order()
    // {
    //     return $this->hasOne(Order::class , 'product_id','id');
    // }
    protected $fillable = [
        'name',
        'description',
        'image',
        'discount',
        'price',
        'secret_code',
        'status',
        'created_at',
        'updated_at'
    ];
}
