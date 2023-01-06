<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;
    use HasFactory;
    protected $table='users';
    protected $primaryKey = 'username';
    protected $fillable = [
        'username',
        'password',
        'fullname',
        'email',
        'number_telephone',
        'address',
        'birthday',
        'level',
        'confirm',
        'confirmation_code'
      ];

      protected $hidden = [
        'remember_token',
        'password'
    ];
    public function order_linked()
    {
       return $this->hasMany(Order::class, 'username','username');
    }

}
