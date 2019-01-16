<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Logs extends Model
{
    public $table = 'user_logs';

    public $fillables = [
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }
}
