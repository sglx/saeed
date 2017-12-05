<?php

namespace App\Http\Controllers\Product;

use App\Categories;
use App\Http\Requests;
use App\Products;
use App\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Validator;
use Verta;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function test()
    {
        return view('test.index');
    }
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {
            $pro = Products::with(['User'])->paginate(10);
            return View::make('product.index', ['pro'=>$pro]);
        }
        else
        {
            $u_id = Auth::id();
            $pro = Products::where('user_id','=',$u_id)->paginate(10);
            return View::make('product.index', ['pro'=>$pro]);
        }
    }
    public function create()
    {
        if (Auth::user()->hasRole('admin'))
        {
            $cat = Categories::where('categories_id','!=','0')->get();
            $users = User::all();
            return view('product/create',['cat'=>$cat,'users'=>$users]);
        }
        else
        {
            $u_id = Auth::id();
            $cat = Categories::where('categories_id','!=','0')->where('user_id','=',$u_id)->get();
            return view('product/create',['cat'=>$cat]);

        }

    }
    public function store(Request $request)
    {
      if($request->has('btn_send')) {
          $messages = [
              'product_name.required' => 'وارد کردن نام محصول الزامی است',
              'cat_product.required' => 'انتخاب دسته برای محصول الزامی است',
              'product_name.max' => 'نام محصول باید 200 کاراکتر باشد',
              'product_price.required' => 'وارد کردن قیمت محصول الزامی است',
              'product_price.integer' => 'مقدار وارد شده باید عدد باشد',
              'short_des.required' => 'توضیحات کوتاه محصول الزامی است',
              'status.integer' => 'مقادیر وضعیت محصول اشتباه است',
              'stock.integer' => 'مقادیر وضعیت محصول موجودی اشتباه است',
          ];
          $validator = Validator::make($request->all(), [
              'product_name' => 'required|max:200',
              'product_price' => 'required|integer',
              'short_des' => 'required',
              'status' => 'integer',
              'stock' => 'integer',
              'cat_product' => 'required',

          ], $messages);
          if ($validator->fails()) {
              return back()->withInput()->withErrors($validator);
          }
          $user_id = Auth::id();
          $Product = new Products();
          $Product->name = $request->name;
          $Product->short_des = $request->short_des;
          $Product->long_des = $request->des;
          $Product->price = $request->product_price;
          $Product->status = $request->status;
          $Product->vip = $request->vip;
          $Product->stock = $request->stock;
          if($request->user)
          {
              $Product->user_id = $request->user;
          }
          else {
              $Product->user_id = $user_id;
          }
          $Product->name = $request->product_name;
          $v = verta();
          $time = $v->hour . ':' . $v->minute . ':' . $v->second;
          $date = $v->year . '-' . $v->month . '-' . $v->day;
          $Product->created_date = $date;
          $Product->created_time = $time;
          $Product->save();
          $cat = $request->cat_product;
          foreach ($cat as $value) {
              $Product->Categories()->attach($value);
          }
          Session::flash('success', "محصول با موفقیت اضافه شد.");
          return Redirect()->back();
      }

    }
    public function get_img(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $images = Products::where('id','=',$id)->first(['img_defualt','img1','img2','img3']);
            return response()->json(array(
                'img_defualt' => $images['img_defualt'],
                'img1'=>$images['img1'],
                'img2'=>$images['img2'],
                'img3'=>$images['img3'],
            ));
        }


    }
    public function del_img(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column = $request->column;
            $value = Products::select($column)->where('id',$id)->get();
            Products::select($column)->where('id',$id)->update(array($column => NULL));

            foreach ($value as $val) {
               $filename = public_path().'/upload/photo/' . $val[$column];
               if(file_exists($filename)) {
                   unlink($filename);
               }
                return $filename; //$filename;
            }
        }


    }

    public function edit($id)
    {

        $u_id = Auth::id();
        Session::put('pro_id', $id);
        if (Auth::user()->hasRole('admin'))
        {
            $pro = Products::where('id','=',$id)->get();
            $allcats= Categories::where('categories_id','!=','0')->get();
            $cats = DB::table('categories_products')->select('categories_id')->where('products_id','=',$id)->get();


        }
        else
        {
            $pro = Products::where('id','=',$id)->get();
            $allcats= Categories::where('categories_id','!=','0')->where('user_id','=',$u_id )->get();
            $cats = DB::table('categories_products')->select('categories_id')->where('products_id','=',$id)->get();



        }
        return View('product.edit',['pro'=>$pro,'allcats'=>$allcats,'cats'=>$cats]);
    }
    public function update(Request $request)
    {
        if($request->has('btn_send')) {
            $messages = [
                'product_name.required' => 'وارد کردن نام محصول الزامی است',
                'categories_id.required' => 'انتخاب دسته برای محصول الزامی است',
                'product_name.max' => 'نام محصول باید 200 کاراکتر باشد',
                'product_price.required' => 'وارد کردن قیمت محصول الزامی است',
                'product_price.integer' => 'مقدار وارد شده باید عدد باشد',
                'short_des.required' => 'توضیحات کوتاه محصول الزامی است',
                'status.integer' => 'مقادیر وضعیت محصول اشتباه است',
                'stock.integer' => 'مقادیر وضعیت محصول موجودی اشتباه است',
            ];
            $validator = Validator::make($request->all(), [
                'product_name' => 'required|max:200',
                'product_price' => 'required|integer',
                'short_des' => 'required',
                'status' => 'integer',
                'stock' => 'integer',
                'categories_id' => 'required',

            ], $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $pro_id = Session::get('pro_id');
            $Product = Products::find($pro_id);
            $Product->name = $request->name;
            $Product->short_des = $request->short_des;
            $Product->long_des = $request->des;
            $Product->price = $request->product_price;
            $Product->status = $request->status;
            $Product->stock = $request->stock;
            $Product->vip = $request->vip;
            $Product->name = $request->product_name;
            $v = verta();
            $time = $v->hour . ':' . $v->minute . ':' . $v->second;
            $date = $v->year . '-' . $v->month . '-' . $v->day;
            $Product->updated_date = $date;
            $Product->created_time = $time;
            DB::table('categories_products')->where('products_id', $pro_id)->delete();
            $cat = $request->categories_id;
            foreach ($cat as $value) {
                $Product->Categories()->attach($value);
            }
            $Product->update();
            Session::flash('success', "محصول با موفقیت ویرایش شد.");
            return Redirect('/product');
        }
    }
    public function delete($id)
    {
        $pro = Products::find($id);
        $pro->delete();
        Session::flash('success', "محصول با موفقیت حذف شد.");
        return Redirect::back();
    }
    public function editor($id)
    {
        Session::put('pro_pic', $id);
        return View::make('product.upload');
    }
    public function upload()
    {
        $data = $_POST['image'];


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('upload/photo/'.$imageName, $data);
        $picnum = $_POST['picnum'];
        $pro_id = Session::get('pro_pic');
        $pro = Products::find($pro_id);
        if($picnum == 0)
        {
            if($pro->img_defualt == '')
            {
                $pro->img_defualt = $imageName;

            }
            else
            {
                $img_name = $pro->img_defualt;
                $filename = public_path().'/upload/photo/' . $img_name;
                if(file_exists($filename)) {
                    unlink($filename);
                }
                $pro->img_defualt = $imageName;

            }
        }
        elseif ($picnum == 1)
        {
            if($pro->img1 == '')
            {
                $pro->img1 = $imageName;

            }
            else
            {
                $img_name = $pro->img1;
                $filename = public_path().'/upload/photo/' . $img_name;
                if(file_exists($filename)) {
                    unlink($filename);
                }
                $pro->img1 = $imageName;

            }
        }
        elseif ($picnum == 2)
        {
            if($pro->img2 == '')
            {
                $pro->img2 = $imageName;

            }
            else
            {
                $img_name = $pro->img2;
                $filename = public_path().'/upload/photo/' . $img_name;
                if(file_exists($filename)) {
                    unlink($filename);
                }
                $pro->img2 = $imageName;

            }        }
        elseif ($picnum == 3)
        {
            if($pro->img3 == '')
            {
                $pro->img3 = $imageName;

            }
            else
            {
                $img_name = $pro->img3;
                $filename = public_path().'/upload/photo/' . $img_name;
                if(file_exists($filename)) {
                    unlink($filename);
                }
                $pro->img3 = $imageName;

            }
        }
        $pro->update();


        echo 'done';
    }
}
