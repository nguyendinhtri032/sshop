<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.import.list',[
            'title' => "Import"
        ]);
    }
}
