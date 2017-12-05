<?php

namespace App\Http\Controllers\API;

use App\Gallery;
use App\Products;
use App\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function gallery()
    {

        $gallery =Gallery::select('id','title','address')->where('user_id',Auth::guard('api')->id())->where('status','=','1')->get();
        return response()->json($gallery);

    }
    public function vip()
    {
        $vip = Products::select('id','name','price','img_defualt')->where('user_id',Auth::guard('api')->id())->where('vip','=','1')->get();
        return response()->json($vip);

    }
    public function enjoyed()
    {
        $enjoyed = Products::orderBy('see','desc')->select('id','name','price','img_defualt')->where('user_id',Auth::guard('api')->id())->take(10)->get();
        return response()->json($enjoyed);
    }
    public function popular()
    {

        $popular = Score::orderBy('positive','desc')->where('user_id',Auth::guard('api')->id())->with(array('Product'=>function($query){
            $query->select('id','name','price','img_defualt');
        }))->take(10)->get();
        return response()->json($popular);
    }
    public function newproduct()
    {

        $pro = Products::orderBy('id','desc')->select('id','name','price','img_defualt')->where('user_id',Auth::guard('api')->id())->take(10)->get();
        return response()->json($pro);
    }
}
