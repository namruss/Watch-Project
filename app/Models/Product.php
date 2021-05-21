<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'categories_id',
        'brands_id',
        'name',
        'price',
        'sale_price',
        'stock',
        'image',
        'description',
        'status'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','categories_id');
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','brands_id');
    }

    public function order_detail(){
        return $this->hasMany(OrderDetail::class,'products_id','id');
    }

    public function scopeSearch($query){
        if($key=request()->key){
            $query=$query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
