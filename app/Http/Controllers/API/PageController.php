<?php

namespace App\Http\Controllers\API;

use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function Pages()
    {
        $page = Pages::select('image','title','id')->where('user_id',Auth::guard('api')->id())->get();
        return response()->json($page);

    }
    public function getPage($id)
    {
        $page = Pages::find($id)->get();
        return response()->json($page);

    }
}
