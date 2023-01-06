<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table ="import";
    protected $primaryKey = 'IDimport';

    

    public function supplier_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(Supplier::class, "IDsupplier", "IDsupplier");
    }


    public function import_detail(){
        //khoa ngoai khoa chinhs\
        return $this->hasMany(ImportDetail::class, "IDimport", "IDimport");
    }
}
