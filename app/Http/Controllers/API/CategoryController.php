<?php

namespace App\Http\Controllers\API;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category()
    {

        $cat = Categories::where('categories_id','0')->where('user_id',Auth::guard('api')->id())->get();
        return response()->json($cat);
    }
    public function subcategory($id)
    {
        $subcat = Categories::where('categories_id',$id)->get();
        return response()->json($subcat);

    }

}
