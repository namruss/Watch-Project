<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'orders_id',
        'products_id',
        'quantity',
        'price'
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','products_id');
    }

    public function order(){
        return $this->hasOne(Order::class,'id','orders_id');
    }
}
