@extends('layouts.panel')

@section('content')


    {!! Form::open(['url'=>'/customer/update']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-offset-1 col-lg-5">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نام</label>
                        <input required type="text" class="form-control" value="{{$customers->name}}" id="name" name="name">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-5">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نام خانوادگی</label>
                        <input required type="text" class="form-control" value="{{$customers->family}}" id="family" name="family">
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
                        <label>نام کاربری</label>
                        <input required type="text" class="form-control" id="username" value="{{$customers->username}}" name="username">
                    </div>
                </div>
            </section>
        </div>
        <div class=" col-lg-5">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>کلمه عبور</label>
                        <input required type="password" class="form-control" id="password" value="{{$customers->password}}" name="password">
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
                            @if($customers->status == 1)
                            <option selected value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                            @elseif($customers->status == 0)
                                <option value="1">فعال</option>
                                <option selected value="0">غیر فعال</option>
                            @endif
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
                        <select name="user" id="user" class="form-control input-sm m-bot15">
                            @foreach($users as $user)
                                @if($user->id == $customers->user_id)
                                <option selected value="{{$customers->user_id}}">{{$user->username}}</option>
                                    @else
                                <option value="{{$user->id}}">{{$user->username}}</option>
                                @endif
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

