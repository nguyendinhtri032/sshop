<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table='category';
    protected $primaryKey = 'IDcategory';
    //public $timestamps = false;
    protected $fillable = [
        'nameCategory',
    ];

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('nameCategory', 'like', '%'.$search.'%');
    } 

    public function product_linked()
    {
       return $this->hasMany(Product::class, 'IDcategory','IDcategory');
    }
}
