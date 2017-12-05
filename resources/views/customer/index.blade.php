@extends('layouts.panel')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>مشتری ها</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/customer/create" class="btn btn-shadow btn-success">ایجاد دسته جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نام کاربری</th>
                    <th>کلمه عبور</th>
                    <th>وضعیت</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>تاریخ ایجاد</th>
                    <th colspan="4">عملیات</th>
                    </thead>
                    <tbody>
                    <?php foreach($customers as $custom): ?>
                    <tr>
                        <td>{{$custom->name}}</td>
                        <td>{{$custom->family}}</td>
                        <td>{{$custom->username}}</td>
                        <td>{{$custom->password}}</td>
                        <td>
                            @if($custom->status == 1)
                                <span class="label label-success">فعال</span>
                            @elseif($custom->status == 0)
                                <span class="label label-danger">غیر فعال</span>
                            @endif
                        </td>
                        @role('admin')
                        <td>{{$custom['User']['username']}}</td>
                        @endrole
                        <td>{{$custom->created_date}}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="edit"><a href="/customer/edit/{{$custom->id}}" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/customer/delete/{{$custom->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                    <?php endforeach; ?>
                    </tr>

                    </tbody>

                </table>

                <div class="clearfix"></div>

            </div>

        </div>
    </div>
@endsection