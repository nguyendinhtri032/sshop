<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'IDsupplier';
    protected $fillable = [

        'name',
        'number_telephone',
        'address'
    ];

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('name', 'like', '%'.$search.'%');
    } 

    public function product_linked()
    {
       return $this->hasMany(Product::class, 'IDsupplier','IDsupplier');
    }
}
