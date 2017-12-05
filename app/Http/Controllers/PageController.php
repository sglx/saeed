<?php

namespace App\Http\Controllers;

use App\Extra_Page;
use App\Pages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
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
            $pages = Pages::with('User')->paginate(10);
        }
        else
        {
            $u_id = Auth::id();
            $pages = Pages::with('User')->where('user_id','=',$u_id)->paginate(10);
        }
        return View::make('page.index', compact('pages'));
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
            return View::make('page.create',compact('users'));
        }
        else
        {
            return View::make('page.create');

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
                'title.required' => 'وارد کردن عنوان صحفه الزامی است.',
                'title.max' => 'عنوان صفحه باید 100 کاراکتر باشد',
                'bodytext.required' => 'وارد کردن متن صفحه الزامی است',
                'bodytext.max' => ' متن صفحه باید 1000 کاراکتر باشد',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
                'state.integer' => 'وضعیت انتخاب شده اشتباه است',

            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'bodytext' => 'required|max:1000',
                'user' => 'integer',
                'state' => 'integer',
                'image'=> 'image'


            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $page = new Pages();
            $page->title = $request->title;
            $page->text = $request->bodytext;
            $page->image= $request->image->getClientOriginalName();
            $imageName =$request->image->getClientOriginalName();

            file_put_contents('upload/page/'.$imageName, '');
            if($request->user)
            {
                $page->user_id = $request->user;
            }
            $page->status = $request->state;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $page->created_date = $date;
            $page->created_time = $time;
            $page->save();
            Session::flash('success', "صفحه مورد نظر با موفقیت اضافه شد.");
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
        Session::put('page_id', $id);
        if (Auth::user()->hasRole('admin'))
        {
            $page = Pages::find($id);
            $users = User::all();
            return View('page.edit',['page'=>$page,'users'=>$users]);

        }
        else
        {
            $page = Pages::find($id);
            return View::make('page.edit',compact('page'));

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
                'title.required' => 'وارد کردن عنوان صحفه الزامی است.',
                'title.max' => 'عنوان صفحه باید 100 کاراکتر باشد',
                'bodytext.required' => 'وارد کردن متن صفحه الزامی است',
                'bodytext.max' => ' متن صفحه باید 1000 کاراکتر باشد',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
                'state.integer' => 'وضعیت انتخاب شده اشتباه است',

            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'bodytext' => 'required|max:1000',
                'user' => 'integer',
                'state' => 'integer'

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $id = Session::get('page_id');
            $page = Pages::find($id);
            $page->title = $request->title;
            $page->text = $request->bodytext;
            if($request->user)
            {
                $page->user_id = $request->user;
            }
            $page->status = $request->state;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $page->created_date = $date;
            $page->created_time = $time;
            $page->update();
            Session::flash('success', "صفحه مورد نظر با موفقیت بروزرسانی  شد.");
            return Redirect('/page/');
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
        $page = Pages::find($id);
        $page->delete();
        Session::flash('success', "صفحه مورد نظر با موفقیت حذف شد.");
        return Redirect::back();
    }
}
