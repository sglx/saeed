@extends('layouts.panel')

@section('content')

    {!! Form::open(['url'=>'/article/update','files'=>true]) !!}


    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-offset-1 col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>عنوان</label>
                        <input required type="text" class="form-control" value="{{$article->title}}" id="title" name="title">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>نویسنده</label>
                        <input required type="text" class="form-control" id="author" value="{{$article->author}}" name="author">
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
                            @if($article->status == 1)
                                <option selected value="1">فعال</option>
                                <option value="0">غیر فعال</option>
                            @elseif($article->status == 0)
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
        <div class="col-lg-offset-1 col-lg-10">
            <section class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>خلاصه مقاله</label>
                        <textarea class="form-control" id="abstract" name="abstract">{{$article->short_des}}</textarea>
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
                        <textarea class="form-control" id="article" name="article">{{$article->des}}</textarea>
                    </div>
                </div>
            </section>
        </div>
    </div>5
    <div class="row">
        <div class="col-lg-offset-1 col-lg-5">
            <input type="submit" value="ثبت" id="btn_send" style="width: 100px" class="btn btn-shadow btn-success" name="btn_send" >
        </div>
    </div>
    {!! Form::close() !!}
@endsection

