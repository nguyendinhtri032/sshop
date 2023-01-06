<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Order extends Model
{
    use HasFactory;
    protected $table='order';
    use HasFactory;
    protected $primaryKey = 'IDorder';
    protected $fillable = [
      'IDorder',
      'total',
      'username',
      'pay',
      'description',
      'status_order'
      ];
      public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('IDorder', 'like', '%'.$search.'%');
    } 

     public function user_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(User::class, "username", "username");
    } 

}
