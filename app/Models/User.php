<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'date_of_birth',
        'age',
        'address',
        'email',
        'username',
        'user_type',
        'user_status',
        'secret_question',
        'secret_answer',
        'password'
    ];
    // user_type -> admin , user
    // user_statis -> Active , InActive

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'secret_question', 'secret_answer',
    ];
}
