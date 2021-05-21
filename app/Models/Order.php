<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'order_date',
        'customer_name',
        'customer_address',
        'customer_phone',
        'payment_method',
        'total',
        'status'
    ];


    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function order_detail(){
        return $this->hasMany(OrderDetail::class,'orders_id','id');
    }

    public function scopeSearch($query){
        if($key=request()->key){
            $query=$query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
