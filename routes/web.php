<?php

use Illuminate\Support\Facades\Route;

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
//--
//login
Route::get("login",function (){
    return view("backend.Login");
})->name("login");
//login post
Route::post("login",function (){
    $email = Request::get("email");
    $password = Request::get("password");
    // goi ham de kiem tra xem email va password truyen vao co dung khong
    if(Auth::Attempt(["email"=>$email,"password"=>$password]))
        return redirect(url("admin/users"));
    else
        return redirect(url("login?notify=invalid"));
});
//--
//logout
Route::get("logout",function (){
    Auth::logout();
    return redirect(url("login"));
});
//--
// backend
//-------------------
//chuc nang users
//goi controller Users, ham index
//tao controller bang lenh php artisan make:controller UsersController
Route::get("admin/users",[App\Http\Controllers\UsersController::class,"index"])->middleware("auth");//phai dang nhap moi thuc hien duoc url nay
//edit users
Route::get("admin/users/update/{id}",[App\Http\Controllers\UsersController::class,"update"]);
Route::post("admin/users/update/{id}",[App\Http\Controllers\UsersController::class,"updatePost"]);
//create
Route::get("admin/users/create",[App\Http\Controllers\UsersController::class,"create"]);
Route::post("admin/users/create",[App\Http\Controllers\UsersController::class,"createPost"]);
//delete
Route::get("admin/users/delete/{id}",[App\Http\Controllers\UsersController::class,"delete"]);
//-------------------
//--
//-------------------
//chuc nang categories
//goi controller Categories, ham index
//tao controller bang lenh php artisan make:controller CategoriesController
Route::get("admin/categories",[App\Http\Controllers\CategoriesController::class,"index"])->middleware("auth");//phai dang nhap moi thuc hien duoc url nay
//edit categories
Route::get("admin/categories/update/{id}",[App\Http\Controllers\CategoriesController::class,"update"]);
Route::post("admin/categories/update/{id}",[App\Http\Controllers\CategoriesController::class,"updatePost"]);
//create
Route::get("admin/categories/create",[App\Http\Controllers\CategoriesController::class,"create"]);
Route::post("admin/categories/create",[App\Http\Controllers\CategoriesController::class,"createPost"]);
//delete
Route::get("admin/categories/delete/{id}",[App\Http\Controllers\CategoriesController::class,"delete"]);
//-------------------
//-------------------
//chuc nang news
//goi controller News, ham index
//tao controller bang lenh php artisan make:controller NewsController
Route::get("admin/news",[App\Http\Controllers\NewsController::class,"index"])->middleware("auth");//phai dang nhap moi thuc hien duoc url nay
//edit news
Route::get("admin/news/update/{id}",[App\Http\Controllers\NewsController::class,"update"]);
Route::post("admin/news/update/{id}",[App\Http\Controllers\NewsController::class,"updatePost"]);
//create
Route::get("admin/news/create",[App\Http\Controllers\NewsController::class,"create"]);
Route::post("admin/news/create",[App\Http\Controllers\NewsController::class,"createPost"]);
//delete
Route::get("admin/news/delete/{id}",[App\Http\Controllers\NewsController::class,"delete"]);
//-------------------
Route::get('/', function () {
    //echo Hash::make("123");
    //return view('welcome');
    return view("frontend.home");
});
// tin tuc theo danh muc
Route::get('news/category/{id}', function ($id) {
    return view("frontend.NewsCategory",["id"=>$id]);
});
// chi tiet tin tuc
Route::get('news/detail/{id}', function ($id) {
    return view("frontend.NewsDetail",["id"=>$id]);
});
