<?php

namespace App\Http\Controllers\API;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function allArticle()
    {
        $art = Article::select('image','title','short_de','see_count','id')->where('user_id',Auth::guard('api')->id())->get();
        return response()->json($art);
    }
    public function getArticle($id)
    {
        $art = Article::select('image','title','short_des','created_date')->where('id',$id)->get();
        return response()->json($art);

    }
}
