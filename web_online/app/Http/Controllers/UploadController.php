<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    public function index(){
        $new = new Upload;
        return view("upload.index", ["new" => $new]);
    }
    
    public function update(Request $req){
        
        $new = new Upload();
        $images = $req->file('file');
        if ($images != ''){
            $name = time().'.jpg';
            $images->move(public_path('/img/upload/'), $name);
            $new->hinhanh = '/img/upload/'.$name;
        }
        return view("upload.show", ["new" => $new]);
    }
}
