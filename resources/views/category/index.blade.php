@extends('layouts.panel')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>دسته بندی ها</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/product/category/create" class="btn btn-shadow btn-success">ایجاد دسته جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>عنوان دسته</th>
                    <th>توضیحات دسته</th>
                    <th>وضعیت دسته</th>
                    <th>زیر دسته</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>تاریخ ایجاد دسته</th>
                    <th colspan="3">عملیات</th>
                    </thead>
                    <tbody>
                    <?php foreach($cat as $category): ?>
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->des}}</td>
                        <td>
                            @if($category->state == 0)
                                <span class="label label-success">نمایش</span>
                            @elseif($category->state == 1)
                                <span class="label label-danger">عدم نمایش</span>
                            @endif
                        </td>
                        @if($category->subCategories->count()>0)
                        <?php foreach($category->subCategories as $child): ?>
                        <td>{{$child->title}}</td>
                        <?php endforeach; ?>
                         @else
                           <td>-</td>
                        @endif
                        <td>{{$category['Users']['username']}}</td>
                        <td>{{$category->created_date}}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="edit"><button href="/product/category/edit/{{$category->id}}" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/product/category/delete/{{$category->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                    <?php endforeach; ?>
                    </tr>

                    </tbody>

                </table>

                <div class="clearfix"></div>

            </div>

        </div>
    </div>
@endsection