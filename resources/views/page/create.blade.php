@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'/page/store','files'=>true]) !!}

   <input type="hidden" name=" {{ csrf_token() }}">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>عنوان صفحه</label>
                        <input required type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
            </section>
        </div>
        <div class=" col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>تصویر صفحه</label>
                        <input type="file" accept="image/*" name="image" id="image">
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
                        <textarea class="form-control" id="bodytext" name="bodytext"></textarea>
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
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>
                </div>
            </section>
        </div>
        @role('admin')
        <div class="col-lg-5">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>انتخاب کاربر</label>
                        <select name="user" id="state" class="form-control input-sm m-bot15">
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

