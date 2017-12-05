<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Validator;

class CustomerController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {
        $customers = Customer::with('User')->get();
        }
        else
        {
            $u_id = Auth::id();
            $customers = Customer::with('User')->where('user_id','=',$u_id)->get();
        }
        return View::make('customer.index', compact('customers'));

    }

    public function create()
    {
        if (Auth::user()->hasRole('admin'))
        {
            $users = User::all();
            return View::make('customer.create',compact('users'));
        }
        else
        {
            return View::make('customer.create');

        }
    }
    public function store(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'name.required' => 'وارد کردن نام مشتری الزامی است',
                'family.required' => 'وارد کردن نام خانوادگی مشتری الزامی است',
                'username.required' => 'وارد کردن نام محصول الزامی است',
                'username.required' => 'وارد کردن کلمه عبور الزامی است',
                'name.max' => 'نام مشتری باید 100 کاراکتر باشد',
                'family.max' => 'نام خانوادگی مشتری باید 150 کاراکتر باشد',
                'username.max' => 'نام کاربری باید 150 کاراکتر باشد',
                'password.min' => 'کلمه عبور باید حداقل 6 کاراکتر باشد',
                'state.integer' => 'مقادیر وضعیت مشتری اشتباه است',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'family' => 'required|max:150',
                'username' => 'required|max:150',
                'password' => 'string|min:6',
                'state' => 'integer',
                'user' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $user_id = Auth::id();
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->family = $request->family;
            $customer->username = $request->username;
            $customer->password = md5($request->password);
            $customer->user_id = $user_id;
            $customer->status = $request->state;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $customer->created_date = $date;
            $customer->created_time = $time;
            $customer->save();
            Session::flash('success', "مشتری مورد نظر با موفقیت اضافه شد.");
            return Redirect('/customer/');

        }
    }
    public function edit($id)
    {
        Session::put('customer_id', $id);
        if (Auth::user()->hasRole('admin'))
        {
        $customers = Customer::find($id);
        $users = User::all();
        return View('customer.edit',['customers'=>$customers,'users'=>$users]);

        }
        else
        {
        $customers = Customer::find($id);
        return View::make('customer.edit',compact('customers'));

        }

    }
    public function update(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'name.required' => 'وارد کردن نام مشتری الزامی است',
                'family.required' => 'وارد کردن نام خانوادگی مشتری الزامی است',
                'username.required' => 'وارد کردن نام محصول الزامی است',
                'username.required' => 'وارد کردن کلمه عبور الزامی است',
                'name.max' => 'نام مشتری باید 100 کاراکتر باشد',
                'family.max' => 'نام خانوادگی مشتری باید 150 کاراکتر باشد',
                'username.max' => 'نام کاربری باید 150 کاراکتر باشد',
                'password.min' => 'کلمه عبور باید حداقل 6 کاراکتر باشد',
                'state.integer' => 'مقادیر وضعیت مشتری اشتباه است',
                'user.integer' => 'کاربر انتخاب شده اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'family' => 'required|max:150',
                'username' => 'required|max:150',
                'password' => 'string|min:6',
                'state' => 'integer',
                'user' => 'integer',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $customer_id = Session::get('customer_id');
            $customer = Customer::find($customer_id);
            $customer->name = $request->name;
            $customer->family = $request->family;
            $customer->username = $request->username;
            $customer->password = md5($request->password);
            $customer->user_id = $request->user;
            $customer->status = $request->state;
            $v = verta();
            $time = $v->hour .':'.$v->minute.':'.$v->second;
            $date = $v->year . '-'.$v->month.'-'.$v->day;
            $customer->updated_date = $date;
            $customer->updated_time = $time;
            $customer->update();
            Session::flash('success', "مشتری مورد نظر با موفقیت اضافه شد.");
            return Redirect('/customer/');

        }
    }
    public function destroy($id)
    {
        $pro = Customer::find($id);
        $pro->delete();
        Session::flash('success', "مشتری مورد نظر با موفقیت حذف شد.");
        return Redirect::back();
    }
}
