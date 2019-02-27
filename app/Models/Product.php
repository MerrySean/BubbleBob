<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Product extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public $fillable = [
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

    public function GetOrCreateProduct($f)
    {
        return $this->firstOrCreate($f);
    }

    public function GetPriceOnDate($date)
    {
        return DB::table('product_price_updates')->select('*')->where('product_id', $this->id)->where('created_at', '<=', $date)->orderBy('created_at', 'desc')->first();
    }
}
