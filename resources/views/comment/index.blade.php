@extends('layouts.panel')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>نظرات</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/product/create" class="btn btn-shadow btn-success">نظر جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>عنوان</th>
                    <th>متن</th>
                    <th>وضعیت</th>
                    <th>نویستده</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>نام محصول</th>
                    <th>تاریخ انتشار</th>
                    <th><span class="glyphicon glyphicon-eye-open"></span></th>
                    <th>ویرایش</th>
                    <th>حذف</th>

                    </thead>
                    <tbody>
                    @foreach($coms as $com)
                        <tr>
                            <td>{{$com->title}}</td>
                            <td>{{$com->text}}</td>
                            <td>
                                @if($com->status == 1)
                                    <span class="label label-success">نمایش</span>
                                @elseif($com->status == 0)
                                    <span class="label label-danger">عدم نمایش</span>
                                @endif
                            </td>
                            <td>
                                @if($com->customer_id == 0)
                                    {{$com->User->username}}
                                @else
                                  {{$com->Customer->username}}
                                @endif
                            </td>
                            <td>{{$com->User->username}}</td>
                            <td>{{$com->Product->name}}</td>
                            <td>{{$com->created_at}}</td>
                            <td>
                                @if($com->see == 1)
                                    <a class="glyphicon glyphicon-eye-open blue" href="/product/comment/{{$com->id}}"></a>
                                @elseif($com->see==0)
                                    <a class="glyphicon glyphicon-eye-open" href="/product/comment/{{$com->id}}"></a>
                                 @endif
                            </td>

                            <td><a class="btn btn-primary btn-xs" href="/product/comment/edit/{{$com->id}}"><span class="glyphicon glyphicon-pencil"></span></a> </td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/product/comment/delete/{{$com->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <input id="hidden_id" type="hidden" name="_token" value="">

                </table>

                <div class="clearfix"></div>
                {{ $coms->links() }}

            </div>

        </div>
    </div>

@endsection
