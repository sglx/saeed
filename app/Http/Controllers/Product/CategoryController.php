<?php

namespace App\Http\Controllers\Product;

use App\Categories;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Verta;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->hasRole('admin'))
            {
            $cat = Categories::with(['parent.subCategories','Users'])->get();
            return View::make('category.index', compact('cat'));
            }
        else
            {
            $u_id = Auth::id();
            $cat = Categories::where('user_id','=',$u_id)->with('parent.subCategories')->get();
            return View::make('category.index', compact('cat'));
            }
    }


    public function create()
    {
        $user_id = Auth::id();
        $cat = Categories::where('categories_id','0')->where('user_id',$user_id)->get();
        return view('category/create',compact('cat'));
    }


    public function store(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'cat_name.required' => 'وارد کردن نام محصول الزامی است',
                'cat_name.max' => 'نام محصول باید 400 کاراکتر باشد',
                'state.integer' => 'مقادیر وضعیت محصول اشتباه است',
                'sub_cat.integer' => 'مقادیر زیر دسته موجودی اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'cat_name' => 'required|max:400',
                'state' => 'integer',
                'sub_cat' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $user_id = Auth::id();
            $cat = new Categories();
            $cat->title = $request->cat_name;
            $cat->des = $request->cat_des;
            $cat->state = $request->state;
            $cat->categories_id = $request->sub_cat;
            $cat->user_id = $user_id;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $cat->created_date = $date;
            $cat->created_time = $time;
            $cat->save();
            Session::flash('success', "دسته بندی با موفقیت اضافه شد.");
            return Redirect('/product/category/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
       // $role = Role::with('user_id.role_id')->
        $cat = Categories::where([
            ['id', '=', $id],
            ['user_id', '=', $user_id]
        ])->get();
        $cats = Categories::where('categories_id','0')->where('user_id',$user_id)->get();
        return View('category.edit',['cat'=>$cat],['cats'=>$cats]);
    }




    public function update(Request $request)
    {

        if ($request->has('btn_send')) {
            $messages = [
                'cat_name.required' => 'وارد کردن نام محصول الزامی است',
                'cat_name.max' => 'نام محصول باید 400 کاراکتر باشد',
                'state.integer' => 'مقادیر وضعیت محصول اشتباه است',
                'sub_cat.integer' => 'مقادیر زیر دسته موجودی اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'cat_name' => 'required|max:400',
                'state' => 'integer',
                'sub_cat' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $user_id = Auth::id();
            $id = $request->id;
            $cat = Categories::find($id);
            $cat->title = $request->cat_name;
            $cat->des = $request->cat_des;
            $cat->state = $request->state;
            $cat->categories_id = $request->sub_cat;
            $v = verta();
            $time = $v->hour . ':' . $v->minute . ':' . $v->second;
            $date = $v->year . '-' . $v->month . '-' . $v->day;
            $cat->updated_date = $date;
            $cat->updated_time = $time;
            $cat->update();
            Session::flash('success', "دسته بندی با موفقیت بروزرسانی شد.");
            return Redirect('/product/category/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categories::find($id);
        $cat->delete();
        Session::flash('success', "دسته بندی با موفقیت حذف شد.");
        return Redirect('/product/category/');

    }
}
