@extends('layouts.panel')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>سوالات اضافی</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/question/create" class="btn btn-shadow btn-success">ایجاد دسته جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>عنوان</th>
                    <th>متن</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>تاریخ ایجاد</th>
                    <th colspan="2">عملیات</th>
                    </thead>
                    <tbody>
                    <?php foreach($q as $item): ?>
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item ->text}}</td>

                        @role('admin')
                        <td>
                           {{$item->User->username}}
                        </td>
                        @endrole
                        <td>{{$item->created_date}}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="edit"><a href="/question/edit/{{$item->id}}" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/question/delete/{{$item->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                        <?php endforeach; ?>
                    </tr>

                    </tbody>

                </table>

                <div class="clearfix"></div>
                {{ $q->links() }}

            </div>

        </div>
    </div>
@endsection