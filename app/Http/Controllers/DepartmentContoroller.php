<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentContoroller extends Controller
{
    //
    public function index(){
        return view('admin.departmemt.index');
    }
}
