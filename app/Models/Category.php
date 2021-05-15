<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function GuzzleHttp\Promise\queue;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];

    //1-N relationship
    public function product(){
        return $this->hasMany(Product::class,'categories_id','id');
    }

    //scope Local search
    public function scopeSearch($query){
        if($key=request()->key){
            $query=$query->where('name','like','%'.$key.'%');
        }
        return $query;
    }


}
