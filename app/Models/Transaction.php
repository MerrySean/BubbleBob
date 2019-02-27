<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = ['id','Customer_Cash','Total_Cost','Customer_Change','Customer_id','transaction_by', 'created_at', 'updated_at'];


    /**
     *  Use : $this->Details
     *  Purpose : this will return all details of current transaction
    */
    public function Details()
    {
        return $this->hasMany('\App\Models\Transaction_Details');
    }

    /**
     *  Use : $this->Customer
     *  Purpose : this will return the customer details of current transaction
    */
    public function Customer()
    {
        return $this->hasOne('\App\Models\Customer','id','Customer_id');
    }

    /**
     *  Use : $this->User
     *  Purpose : this will return the staff that transacted this current transaction
    */
    public function User()
    {
        return $this->belongsTo('\App\Models\User','transaction_by','id');
    }


    /**
     *  Use : $this->GetFullTransactionDetails()
     *  Purpose : this will return the transaction details that transacted this current transaction
    */
    public function GetFullTransactionDetails()
    {
        $FullDetails = [
            'Additional' => []
        ];
        foreach ($this->Details as $k2 => $td) {
            if ($td->product->type_of_product == 'Additional') {
                array_push($FullDetails['Additional'], [
                    'name' =>  $td->product->name,
                    'price' => $td->product->GetPriceOnDate($this->created_at)->new_price,
                    'type_of_product' => $td->product->type_of_product,
                    'quantity' => $td->product->quantity,
                    'last_update_user' => $td->product->last_update_user,
                ]);
            } else {
                $FullDetails[$td->product->type_of_product] = [
                            'id' =>  $td->product->id,
                            'name' =>  $td->product->name,
                            'price' => $td->product->GetPriceOnDate($this->created_at)->new_price,
                            'type_of_product' => $td->product->type_of_product,
                            'quantity' => $td->product->quantity,
                            'last_update_user' => $td->product->last_update_user,
                ];
            }
        }
        return $FullDetails;
    }
}
