@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'/article/store','files'=>true]) !!}


    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-offset-1 col-lg-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>عنوان</label>
                        <input required type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-2">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نویسنده</label>
                        <input required type="text" class="form-control" id="author" name="author">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>تصویر</label>
                        <input type="file" accept="image/*" name="image" id="image">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-2">
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
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>خلاصه مقاله</label>
                        <textarea class="form-control" id="abstract" name="abstract"></textarea>
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
                        <label>متن مقاله</label>
                        <textarea class="form-control" id="article" name="article"></textarea>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @role('admin')
    <div class="row">
        <div class=" col-lg-offset-1 col-lg-10">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>انتخاب کاربر</label>
                        <select name="user" id="user " class="form-control input-sm m-bot15">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endrole

    <div class="row">
        <div class="col-lg-offset-1 col-lg-5">
            <input type="submit" value="ثبت" id="btn_send" style="width: 100px" class="btn btn-shadow btn-success" name="btn_send" >
        </div>
    </div>
    {!! Form::close() !!}
@endsection

