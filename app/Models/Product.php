<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //ok
    use HasFactory;
 
    protected $fillable = [
        'name', 
        'image', 
        'description',
        'price'

    ];

    //Relacionamentos
    //1 produto pode ter N pedidos
    public function Orders(){
        return $this->belongsToMany('App\Models\Order');
    }

}