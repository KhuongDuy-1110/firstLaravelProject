<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//load class News (model) de su dung o day
use App\Models\News;
class NewsController extends Controller
{
    public $model;
//    ham tao
    public function __construct()
    {
        // khai bao bien $model thanh bien object cua class News
        $this->model = new News();
    }

    public function index(Request $request){
//        lay du lieu, phan 4 ban ghi tren mot trang
        $data = $this->model->modelRead();
        //goi view, truyen du lieu ra view
        return view("backend.NewsRead",["data"=>$data]);
    }
    public function update(Request $request,$id){
        // lay 1 ban ghi
        $record = $this->model->modelGetRecord($id);
        return view("backend.NewsCreateUpdate",["record"=>$record]);
    }
    public function updatePost(Request $request,$id){
        // update cot name
        $this->model->modelUpdate($id);
        return redirect(url("admin/news"));
    }
    public function create(Request $request){
        return view("backend.NewsCreateUpdate");
    }
    public function createPost(Request $request){
        $this->model->modelCreate();
        return redirect(url("admin/news"));
    }
    // delete
    public function delete(Request $request,$id){
        $this->model->modelDelete($id);
        return redirect(url("admin/news"));
    }
}
