<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class QuestionController extends Controller
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
            $q = Question::paginate(10);
            return View('question.index',['q'=>$q]);
        }
        else
        {
            $u_id = Auth::id();
            $q = Question::where('user_id','=',$u_id)->paginate(10);
            return View('question.index',['q'=>$q]);
        }
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
            return View::make('question.create',compact('users'));
        }
        else
        {
            return View::make('question.create');

        }
    }

    public function store(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'title.required' => 'وارد کردن سوال الزامی است',
                'answer_01.required' => 'وارد کردن پاسخ الزامی است',
                'title.max' => 'سوال باید 100 کاراکتر باشد',
                'answer.max' => 'پاسخ باید 500 کاراکتر باشد',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'answer_01' => 'required|max:500',
                'user' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $user_id = Auth::id();
            $q = new Question();
            $q->title = $request->title;
            $q->text = $request->answer_01;
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
            Session::flash('success', "سوال مورد نظر با موفقیت اضافه شد.");
            return Redirect('/question/');
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
        Session::put('question_id', $id);
        if (Auth::user()->hasRole('admin'))
        {
            $q = Question::find($id);
            $users = User::all();
            return View('question.edit',['q'=>$q,'users'=>$users]);

        }
        else
        {
            $q = Question::find($id);
            return View::make('question.edit',compact('q'));

        }
    }


    public function update(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'text.required' => 'وارد کردن سوال الزامی است',
                'answer_01.required' => 'وارد کردن پاسخ الزامی است',
                'text.max' => 'سوال باید 100 کاراکتر باشد',
                'answer.max' => 'پاسخ باید 500 کاراکتر باشد',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'answer_01' => 'required|max:500',
                'user' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $customer_id = Session::get('question_id');
            $q = Question::find($customer_id);
            $q->title = $request->title;
            $q->text = $request->answer_01;
            if($request->user)
            {
            $q->user_id = $request->user;
            }
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $q->updated_date = $date;
            $q->updated_time = $time;
            $q->update();
            Session::flash('success', "سوال  مورد نظر با موفقیت ویرایش شد.");
            return Redirect('/question/');

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
        $q = Question::find($id);
        $q->delete();
        Session::flash('success', "سوال مورد نظر با موفقیت حذف شد.");
        return Redirect::back();
    }
}
