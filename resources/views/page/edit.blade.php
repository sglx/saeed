@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'/page/update']) !!}

    <input type="hidden" name=" {{ csrf_token() }}">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>عنوان صفحه</label>
                        <input required type="text" value="{{$page->title}}" class="form-control" id="title" name="title">
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
                        <label>متن صفحه</label>
                        <textarea class="form-control" id="bodytext" name="bodytext">{{$page->text}}</textarea>
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
                        <label>وضعیت</label>
                        <select name="state" id="state" class="form-control input-sm m-bot15">
                            @if($page->status == 1)
                                <option selected value="1">فعال</option>
                                <option value="0">غیر فعال</option>
                            @elseif($page->status == 0)
                                <option value="1">فعال</option>
                                <option selected value="0">غیر فعال</option>
                            @endif
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-5">
            <input type="submit" value="ثبت" id="btn_send" style="width: 100px" class="btn btn-shadow btn-success" name="btn_send" >
        </div>
    </div>
    {!! Form::close() !!}
    {{--@if(isset($errors))--}}
    {{--@foreach ($errors->all() as $error)--}}

    {{--<li>{{$error}}</li>--}}
    {{--@endforeach--}}
    {{--@endif--}}

@endsection

