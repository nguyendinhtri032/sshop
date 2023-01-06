<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    use HasFactory;
    protected $table ="import-details";
    protected $primaryKey = 'IDimport';


    

    public function import_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(Import::class, "IDimport", "IDimport");
    }


    public function product_linked(){
        return $this->belongsTo(Product::class, "IDproduct", "IDproduct");
    }
}
