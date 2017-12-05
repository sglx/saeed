@extends('layouts.panel')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>مقاله</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/article/create" class="btn btn-shadow btn-success">ایجاد مقاله جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>عنوان</th>
                    <th>خلاصه مقاله</th>
                    <th>نویسنده</th>
                    <th>وضعیت</th>
                    <th>تعداد بازدید</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>تاریخ ایجاد</th>
                    <th colspan="2">عملیات</th>
                    </thead>
                    <tbody>
                     @foreach($article as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->short_des}}</td>
                        <td>{{$item->author}}</td>
                        <td>
                            @if($item->status == 1)
                                <span class="label label-success">فعال</span>
                            @elseif($item->status == 0)
                                <span class="label label-danger">غیر فعال</span>
                            @endif
                        </td>
                        <td>{{$item->see_count}}</td>
                        @role('admin')

                        <td>{{$item['User']['username']}}</td>


                        @endrole
                        <td>{{$item->created_date}}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="edit"><a href="/article/edit/{{$item->id}}" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/article/delete/{{$item->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                        <?php endforeach; ?>
                    </tr>

                    </tbody>

                </table>

                <div class="clearfix"></div>
                {{ $article->links() }}

            </div>

        </div>
    </div>
@endsection