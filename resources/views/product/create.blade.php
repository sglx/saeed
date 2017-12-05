@extends('layouts.panel')

@section('content')


        {!! Form::open(['url'=>'/product/store','files'=>true]) !!}

        {{ csrf_field() }}
      <div class="row">
        <div class="col-lg-8">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نام محصول</label>
                        <input required type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">آیا این محصول ویژه است؟</label>
                        <select name="vip" id="vip" class="form-control input-sm m-bot15">
                            <option value="1">بلی</option>
                            <option selected value="0">خیر</option>
                        </select>
                    </div>
                </div>
            </section>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-8">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>توضیح کوتاه</label>
                        <textarea class="form-control" id="short_des" name="short_des"></textarea>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-6">قیمت محصول</label>
                        <input type="number" required class="form-control" id="product_price" name="product_price"></input>

                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-2">وضعیت</label>
                        <select name="status" id="status" class="form-control input-sm m-bot15">
                            <option value="1">نمایش محصول</option>
                            <option value="0">عدم نمایش</option>
                        </select>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-2">موجودی</label>
                        <select name="stock" id="stock" class="form-control input-sm m-bot15">
                            <option value="1">موجود</option>
                            <option value="0">عدم موجودی</option>
                        </select>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-12">دسته ها</label></br>
                        <select multiple="multiple" id="productGroup" name="cat_product" required>
                            @foreach($cat as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>
        </div>
        @role('admin')
        <div class="col-lg-offset-8 col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-12">کاربر</label></br>
                        <select name="user" id="user" class="form-control input-sm m-bot15">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>
        </div>
        @endrole

    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>توضیح کامل</label>
                        <textarea  class="form-control" id="des" name="des"></textarea>
                    </div>
                </div>
            </section>
        </div>
    </div>

        <input type="submit" value="ثبت" id="btn_send" class="btn btn-shadow btn-success" name="btn_send" >
        {!! Form::close() !!}


@endsection

