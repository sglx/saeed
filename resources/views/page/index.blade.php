@extends('layouts.panel')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>صفحات اضافی</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/page/create" class="btn btn-shadow btn-success">ایجاد صفحه جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>وضعیت</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>تاریخ ایجاد</th>
                    <th colspan="4">عملیات</th>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{$page->title}}</td>
                        <td>{{$page->text}}</td>
                        <td>
                            @if($page->status == 1)
                                <span class="label label-success">فعال</span>
                            @elseif($page->status == 0)
                                <span class="label label-danger">غیر فعال</span>
                            @endif
                        </td>
                        @role('admin')
                        <td>{{$page['User']['username']}}</td>
                        @endrole
                        <td>{{$page->created_date}}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="edit"><a href="/page/edit/{{$page->id}}" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/page/delete/{{$page->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                        @endforeach
                    </tr>

                    </tbody>

                </table>

                <div class="clearfix"></div>
                {{ $pages->links() }}

            </div>

        </div>
    </div>

@endsection