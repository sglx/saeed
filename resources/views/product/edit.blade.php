@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'/product/update','files'=>true]) !!}
@foreach($pro as $item)
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-8">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نام محصول</label>
                        <input required type="text" value="{{$item->name}}" class="form-control" id="product_name" name="product_name">
                    </div>
                </div>
            </section>
        </div>
        {{ csrf_field() }}

        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">آیا این محصول ویژه است؟</label>
                        <select name="vip" id="vip" class="form-control input-sm m-bot15">
                            @if($item->vip == 1)
                                <option selected value="1">بلی</option>
                                <option value="0">خیر</option>
                            @elseif($item->vip == 0)
                                <option value="1">بلی</option>
                                <option selected value="0">خیر</option>
                            @endif
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
                        <textarea class="form-control" id="short_des" name="short_des">{{$item->short_des}}</textarea>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-6">قیمت محصول</label>
                        <input type="number" required class="form-control" value="{{$item->price}}" id="product_price" name="product_price"></input>
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
                            @if($item->status == 1)
                            <option selected value="1">نمایش محصول</option>
                            <option value="0">عدم نمایش</option>
                            @elseif($item->status == 0)
                            <option value="1">نمایش محصول</option>
                            <option selected value="0">عدم نمایش</option>
                            @endif
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
                        @if($item->stock == 1)
                            <option selected value="1">موجود است</option>
                            <option value="0">موجود نیست</option>
                        @elseif($item->stock == 0)
                            <option value="1">موجود است</option>
                            <option selected value="0">موجود نیست</option>
                        @endif
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
                        <select multiple="multiple" id="categories_id" name="categories_id" required>

                        @foreach($allcats as $cat)
                                @foreach($cats as $c)
                                @if($c->categories_id == $cat->id)
                                    <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                                @else
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>توضیح کامل</label>
                        <textarea  class="form-control" id="des" name="des">{{$item->long_des}}</textarea>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <input type="submit" value="ثبت" id="btn_send" class="btn btn-shadow btn-success" name="btn_send" >
    {!! Form::close() !!}

@endforeach

@endsection

