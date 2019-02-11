<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_Details extends Model
{
    //
    protected $table = 'transaction_details';
    protected $fillable = ['transaction_id', 'transaction_by', 'product_id' ];

    public function transaction()
    {
        return $this->belongsTo('\App\Models\Transaction','transaction_id','id');
    }

    public function product()
    {
        return $this->hasOne('\App\Models\Product','id','product_id');
    }
}
