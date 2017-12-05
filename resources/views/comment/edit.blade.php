@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'product/comment/update']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-offset-1 col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>عنوان</label>
                        <input required type="text" class="form-control" value="{{$com->title}}" id="title" name="title">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>وضعیت</label>
                        <select name="state" id="state" class="form-control input-sm m-bot15">
                            @if($com->status == 1)
                                <option selected value="1">فعال</option>
                                <option value="0">غیر فعال</option>
                            @elseif($com->status == 0)
                                <option value="1">فعال</option>
                                <option selected value="0">غیر فعال</option>
                            @endif
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>متن</label>
                        <textarea class="form-control" id="matn" name="matn">{{$com->text}}</textarea>
                    </div>
                </div>
            </section>
        </div>
        <div class=" col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>محصول</label>
                        <select name="product" id="product" class="form-control input-sm m-bot15">
                        @foreach($pro as $value)
                                @if($com->Product->id == $value->id)
                                        <option selected value="{{$value->id}}">{{$value->name}}</option>
                                @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                        @endforeach
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-offset-1 col-lg-5">
            <input type="submit" value="ثبت" id="btn_send" style="width: 100px" class="btn btn-shadow btn-success" name="btn_send" >
        </div>
    </div>
    {!! Form::close() !!}


@endsection

