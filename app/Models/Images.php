<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    public $timestamps = false;
    protected $primaryKey = 'IDproduct';
    
    public function product_linked(){
        return $this->belongsTo(Product::class, 'IDproduct', 'IDproduct');
    }
}
