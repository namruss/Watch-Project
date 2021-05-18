<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'idCate',
        'name',
        'price',
        'salePrice',
        'stock',
        'image',
        'description',
        'isActive'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','id_categories');
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','id_brands');
    }

    public function scopeSearch($query){
        if($key=request()->key){
            $query=$query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
