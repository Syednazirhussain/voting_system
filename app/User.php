<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    //use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
         'password', 
         'role', 
         'status',
          'mobile_no', 
          'ssn',
           'age', 
           'gender',
            'street_one',
             'street_two',
              'city',
        'state','zipcode',
        'dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
