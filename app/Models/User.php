<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'password',
        'level',
        'image',
        'status'
    ];

    public function order(){
        return $this->hasMany(Order::class,'user_id','id');
    }
}
