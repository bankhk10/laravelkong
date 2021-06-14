<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DepartmentContoroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $userr = DB::table('users')->get();
    return view('dashboard',compact('userr'));
})->name('dashboard');

Route::get('/departmemt/all',[DepartmentContoroller::class,'index'])->name('departmemt');
Route::post('/departmemt/add',[DepartmentContoroller::class,'store'])->name('adddepartmemt');
