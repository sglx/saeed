<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ArticaleController extends Controller
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
            $article = Article::with('User')->paginate(10);
        }
        else
        {
            $u_id = Auth::id();
            $article = Article::with('User')->where('user_id','=',$u_id)->paginate(10);
        }
        return View::make('article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin'))
        {
            $users = User::all();
            return View::make('article.create',compact('users'));
        }
        else
        {
            return View::make('article.create');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'title.required' => 'وارد کردن عنوان مقاله اشتباه است.',
                'title.max' => 'عنوان مقاله باید 100 کاراکتر باشد',
                'author.required' => 'وارد کردن نویسنده مقاله اشتباه است.',
                'author.max' => 'نویسنده مقاله باید 100 کاراکتر باشد',
                'abstract.required' => 'وارد کردن خلاصه مقاله الزامی است',
                'abstract.max' => ' خلاصه مقاله باید 500 کاراکتر باشد',
                'article.required' => 'وارد کردن متن مقاله الزامی است',
                'article.max' => ' متن مقاله باید 800 کاراکتر باشد',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
                'state.integer' => 'وضعیت انتخاب شده اشتباه است',

            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'author' => 'required|max:100',
                'abstract' => 'required|max:500',
                'article' => 'required|max:800',
                'user' => 'integer',
                'state' => 'integer',
                'image'=> 'image'

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $q = new Article();
            $q->title = $request->title;
            $q->author = $request->author;
            $q->short_des = $request->abstract;
            $q->des = $request->article;
            $q->image= $request->image->getClientOriginalName();
            $imageName =$request->image->getClientOriginalName();

            file_put_contents('upload/article/photo/'.$imageName, '');
            $q->status = $request->state;
            if($request->user)
            {
                $q->user_id = $request->user;
            }
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $q->created_date = $date;
            $q->created_time = $time;
            $q->save();
            Session::flash('success', "مقاله مورد نظر با موفقیت اضافه شد.");
            return Redirect('/article/');
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
        Session::put('article_id', $id);
        if (Auth::user()->hasRole('admin'))
        {
            $article = Article::find($id);
            $users = User::all();
            return View('article.edit',['article'=>$article,'users'=>$users]);

        }
        else
        {
            $article = Article::find($id);
            return View::make('article.edit',compact('article'));

        }
    }

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
                'title.required' => 'وارد کردن عنوان مقاله اشتباه است.',
                'title.max' => 'عنوان مقاله باید 100 کاراکتر باشد',
                'author.required' => 'وارد کردن نویسنده مقاله اشتباه است.',
                'author.max' => 'نویسنده مقاله باید 100 کاراکتر باشد',
                'abstract.required' => 'وارد کردن خلاصه مقاله الزامی است',
                'abstract.max' => ' خلاصه مقاله باید 500 کاراکتر باشد',
                'article.required' => 'وارد کردن متن مقاله الزامی است',
                'article.max' => ' متن مقاله باید 800 کاراکتر باشد',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
                'state.integer' => 'وضعیت انتخاب شده اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'author' => 'required|max:100',
                'abstract' => 'required|max:500',
                'article' => 'required|max:800',
                'user' => 'integer',
                'state' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $article_id = Session::get('article_id');
            $q = Article::find($article_id);
            $q->title = $request->title;
            $q->author = $request->author;
            $q->short_des = $request->abstract;
            $q->des = $request->article;
            $q->status = $request->state;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $q->updated_date = $date;
            $q->updated_time = $time;
            $q->update();
            Session::flash('success', "مقاله مورد نظر با موفقیت بروزرسانی شد.");
            return Redirect('/article/');
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
        $pro = Article::find($id);
        $pro->delete();
        Session::flash('success', "مقاله مورد نظر با موفقیت حذف شد.");
        return Redirect::back();
    }
}
