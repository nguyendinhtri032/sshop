<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotion';
    protected $primaryKey = 'IDpromotion';
    protected $fillable = [

        'namePromotion',
        'deduction',
        'description	'
    ];

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('namePromotion', 'like', '%'.$search.'%');
    } 

    public function product_linked()
    {
       return $this->hasMany(Product::class, 'IDpromotion','IDpromotion');
    }

}
