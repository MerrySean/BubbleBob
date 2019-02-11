<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = ['Customer_Cash','Total_Cost','Customer_Change','Customer_id' ];

    public function Details()
    {
        return $this->hasMany('\App\Models\Transaction_Details');
    }

    public function Customer()
    {
        return $this->hasOne('\App\Models\Customer','id','Customer_id');
    }

    public function User()
    {
        return $this->belongsTo('\App\Models\User','transaction_by','id');
    }



    public function GetFullTransactionDetails()
    {
        $FullDetails = [];
        foreach ($this->Details as $k2 => $td) {
            $d1 = [
                $k2 => [
                    'product' => [
                        'name' =>  $td->product->name,
                        'price' => $td->product->price,
                        'type_of_product' => $td->product->type_of_product,
                        'quantity' => $td->product->quantity,
                        'last_update_user' => $td->product->last_update_user,
                    ],
                ]
            ];
            array_push($FullDetails,$d1);
        }
        return $FullDetails;
    }
}
