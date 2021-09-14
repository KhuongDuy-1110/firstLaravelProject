<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// muon su dung doi tuong nao thi phai khai bao o day
// doi tuong thao tac csdl
use DB;
// doi tuong ma hoa password
use Hash;
//khai bao model categories o day de su dung
// cu phap: use ten_namespace\tenmodel
use App\Models\Categories;

class CategoriesController extends Controller
{
    // khai bao bien $model (la mot bien binh thuong trong class)
    public $model;
    // ham tao
    public function __construct()
    {
        //gan bien $model tro thanh object cua class Categoties
        $this->model = new Categories();
    }

    public function index(Request $request){
//        lay du lieu, phan 4 ban ghi tren mot trang
        $data = $this->model->orderBy("id","desc")->paginate(4);
        //goi view, truyen du lieu ra view
        return view("backend.CategoriesRead",["data"=>$data]);
    }
    public function update(Request $request,$id){
        // lay 1 ban ghi
        $record = $this->model->where("id","=",$id)->first();
        return view("backend.CategoriesCreateUpdate",["record"=>$record]);
    }
    public function updatePost(Request $request,$id){
        $name = $request->name;
        // update cot name
        $this->model->where("id","=",$id)->update(["name"=>$name]);
        return redirect(url("admin/categories"));
    }
    public function create(Request $request){
        return view("backend.CategoriesCreateUpdate");
    }
    public function createPost(Request $request){
        $name = $request->name;
        $this->model->insert(["name"=>$name]);
        return redirect(url("admin/categories"));
    }
    // delete
    public function delete(Request $request,$id){
        $this->model->where("id","=",$id)->delete();
        return redirect(url("admin/categories"));
    }
}
