<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// su dung doi tuong DB de thao tac csdl
use DB;
//su dung doi tuong Request de lay GET, POST
use Request;
class News extends Model
{
    use HasFactory;
    //ham lay cac ban ghi co phan trang
    public function modelRead(){
        $data = DB::table("news")->orderBy("id","desc")->paginate(10);
        return $data;
    }
    // lay 1 ban ghi
    public function modelGetRecord($id){
        $record = DB::table("news")->where("id","=",$id)->first();
        return $record;
    }
    //update
    public function modelUpdate($id){
        $name = Request::get("name");
        $category_id = Request::get("category_id");
        $hot = Request::get("hot")!=""?1:0;
        $description = Request::get("description");
        $content = Request::get("content");
        //update ban ghi
        DB::table("news")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"hot"=>$hot,
            "description"=>$description,"content"=>$content]);
        //neu co anh thi thuc hien upload anh
        if(Request::hasFile("photo")){
            //--
            // lay anh cu de xoa
            $oldphoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
            if(isset($oldphoto->photo)&&file_exists('upload/news/'.$oldphoto->photo))
                unlink('upload/news/'.$oldphoto->photo);
            //--
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move("upload/news",$photo);
            //update ban ghi
            DB::table("news")->where("id","=",$id)->update(["photo"=>$photo]);
        }
    }
    //update
    public function modelCreate(){
        $name = Request::get("name");
        $category_id = Request::get("category_id");
        $hot = Request::get("hot")!=""?1:0;
        $description = Request::get("description");
        $content = Request::get("content");
        $photo = "";
        if(Request::hasFile("photo")){
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move("upload/news",$photo);
        }
        //update ban ghi
        DB::table("news")->insert(["name"=>$name,"category_id"=>$category_id,"hot"=>$hot,
            "description"=>$description,"content"=>$content,"photo"=>$photo]);
    }
    //xoa ban ghi
    public function modelDelete($id){
        //--
        // lay anh de xoa
        $oldphoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
        if(isset($oldphoto->photo)&&file_exists('upload/news/'.$oldphoto->photo))
            unlink('upload/news/'.$oldphoto->photo);
        //--
        DB::table("news")->where("id","=",$id)->delete();
    }
}
