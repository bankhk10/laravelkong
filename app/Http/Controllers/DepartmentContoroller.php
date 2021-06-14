<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
class DepartmentContoroller extends Controller
{
    //
    public function index(){
        $all = Department::paginate(5);

        return view('admin.departmemt.index',compact('all'));
    }
    //ตรวจสอบข้อมูล
    public function store(Request $request){
        $request->validate([
            'department_name'=>'required|unique:departments|max:100'
        ],
        [
            'department_name.required'=>"กรุณาป้อนชื่อ",
            'department_name.max'=>"ตัวอักษรเกิน",
            'department_name.unique'=>"ชื่อซ้ำ",
        ]
    );
        //บันทึกข้อมูล
        $depratment = new Department;
        $depratment->department_name = $request->department_name;
        $depratment->user_id = auth::user()->id;
        $depratment->save();
        return redirect()->back()->with('success',"บันทึกเรียบร้อย");

    }

}
