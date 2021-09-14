<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// muon su dung doi tuong nao thi phai khai bao o day
// doi tuong thao tac csdl
use DB;
// doi tuong ma hoa password
use Hash;

class UsersController extends Controller
{
    public function index(Request $request){
//        lay du lieu, phan 4 ban ghi tren mot trang
        $data = DB::table("users")->orderBy("id","desc")->paginate(4);
    	//goi view, truyen du lieu ra view
        return view("backend.UsersRead",["data"=>$data]);
    }
    public function update(Request $request,$id){
        // lay 1 ban ghi
        $record = DB::table("users")->where("id","=",$id)->first();
        return view("backend.UsersCreateUpdate",["record"=>$record]);
    }
    public function updatePost(Request $request,$id){
        $name = $request->name;
        $password = $request->password;
        // update cot name
        DB::table("users")->where("id","=",$id)->update(["name"=>$name]);
        if($password != ""){
            $password = Hash::make($password);
            DB::table("users")->where("id","=",$id)->update(["password"=>$password]);
        }
        return redirect(url("admin/users"));
    }
    public function create(Request $request){
        return view("backend.UsersCreateUpdate");
    }
    public function createPost(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
//        ma hoa password
        $password = Hash::make($password);
        // kierm tra neu user khong ton tai thi moi insert ban ghi
        $check = DB::table("users")->where("email","=",$email)->count();
        if($check == 0)
            DB::table("users")->insert(["name"=>$name,"email"=>$email,"password"=>$password]);
        else
            return redirect(url("admin/users/create?notify=exists"));
        return redirect(url("admin/users"));
    }
    // delete
    public function delete(Request $request,$id){
        DB::table("users")->where("id","=",$id)->delete();
        return redirect(url("admin/users"));
    }
}
