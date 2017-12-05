@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'/product/category/store']) !!}

    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نام دسته</label>
                        <input required type="text" class="form-control" id="cat_name" name="cat_name">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea class="form-control" id="cat_des" name="cat_des"></textarea>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-5">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>دسته اصلی</label>
                        <select name="sub_cat" id="sub_cat"  class="form-control input-sm m-bot15">
                            <option value="0">بدون دسته اصلی</option>
                            @foreach($cat as $items)
                            <option value="{{$items->id}}">{{$items->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-5">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>وضعیت</label>
                        <select name="state" id="state" class="form-control input-sm m-bot15">
                            <option value="0">نمایش</option>
                            <option value="1">عدم نمایش</option>
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </div>


            <input type="submit" value="ثبت" id="btn_send" style="width: 100px" class="btn btn-shadow btn-success" name="btn_send" >

    {!! Form::close() !!}


@endsection

