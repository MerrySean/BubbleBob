<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillables = [
        'name',
        'price',
        'type_of_product',
        'quantity',
        'last_update_user'
    ];

    public function GetWash()
    {
        return $this->where('type_of_product', 'wash')->get();
    }

    public function GetDry()
    {
        return $this->where('type_of_product', 'dry')->get();
    }

    public function GetAdditional()
    {
        return $this->where('type_of_product', 'additional')->get();
    }
}
