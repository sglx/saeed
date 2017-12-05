<?php

namespace App\Http\Controllers\API;

use App\Categories;
use App\Comment;
use App\Customer;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ListPro($id,$limit)
    {
        $pro = Categories::with(array('Product'=>function($query){
        $query->select('id','name','price','img_defualt');}))->where('id',$id)->take($limit)->get();
        return response()->json($pro);

    }
    public function DetailsPro($id)
    {
        $pro = Products::where('id',$id)->select('img_defualt','img1','img2','img3','title','price','long_des')->with('Rate')->get();
        $product = Products::find($id);
        $product->see = $product->see + 1;
        $product->update();
        return response()->json($pro);
    }
    public function Comment($id)
    {
       $com = Comment::where('product_id',$id)->where('status','1')->with(array('Customers'=>function($query){
           $query->select('name');}))->get();
        return response()->json($com);

    }


}
