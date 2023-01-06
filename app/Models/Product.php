<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='product';

    protected $primaryKey = 'IDproduct';

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('name', 'like', '%'.$search.'%');
    } 

    public function category_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(Category::class, "IDcategory", "IDcategory");
    }

    public function promotion_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(Promotion::class, "IDpromotion", "IDpromotion");
    }

    public function supplier_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(Supplier::class, "IDsupplier", "IDsupplier");
    }

    public function images_linked(){
        return $this->hasMany(Images::class, 'IDproduct', 'IDproduct');
    }

}
