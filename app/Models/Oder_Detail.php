<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'idOrder',
        'idProduct',
        'quantity',
        'price'

   
    ];
}
