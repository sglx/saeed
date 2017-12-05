<?php

namespace App\Http\Controllers\Product;

use App\Comment;
use App\Customer;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class CommentController extends Controller
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
            $coms = Comment::paginate(10);
            return View('comment.index',['coms'=>$coms]);
        }
        else
        {
            $u_id = Auth::id();
            $coms = Comment::where('user_id','=',$u_id)->paginate(10);
            return View('comment.index',['coms'=>$coms]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put('comment_id', $id);
        if (Auth::user()->hasRole('admin'))
        {
            $com = Comment::find($id);
            $pro = Products::all();
            return View('comment.edit',['com'=>$com,'pro'=>$pro]);

        }
        else
        {
            $com = Comment::find($id);
            $u_id = Auth::id();
            $pro = Products::where('user_id','=',$u_id);
            return View::make('comment.edit',['com'=>$com,'pro'=>$pro]);

        }    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'title.required' => 'وارد کردن نام مشتری الزامی است',
                'matn.required' => 'وارد کردن نام مشتری الزامی است',
                'title.max' => 'عنوان باید 200 کاراکتر باشد',
                'matn.max' => 'عنوان باید 400 کاراکتر باشد',
                'state.integer' => 'مقادیر وضعیت اشتباه است',
                'product.integer' => 'مقادیر انتخاب شده برای محصول اشتباه است.',
            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:200',
                'matn' => 'required|max:400',
                'state' => 'integer',
                'product' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $com_id = Session::get('comment_id');
            $com = Comment::find($com_id);
            $com->title = $request->title;
            $com->text = $request->matn;
            $com->status = $request->state;
            $com->product_id = $request->product;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $com->updated_date = $date;
            $com->updated_time = $time;
            $com->update();
            Session::flash('success', "دیدگاه مورد نظر با موفقیت اضافه شد.");
            return Redirect('product/comment/');


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
        $pro = Comment::find($id);
        $pro->delete();
        Session::flash('success', "دیدگاه با موفقیت حذف شد.");
        return Redirect::back();
    }
}
