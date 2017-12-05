@extends('layouts.panel')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-10 col-md-10 col-xs-8">
                        <span>محصولات</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-4">
                        <a  href="/product/create" class="btn btn-shadow btn-success">محصول جدید</a>
                    </div>
                </div>
            </header>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>دسته محصول</th>
                    <th>وضعیت</th>
                    <th>موجودی</th>
                    <th>ویژه</th>
                    @role('admin')
                    <th>کاربر</th>
                    @endrole
                    <th>تاریخ اضافه شدن محصول</th>
                    <th>تصاویر محصول</th>
                    <th>ویرایش</th>
                    <th>حذف</th>

                    </thead>
                    <tbody>
                    @foreach($pro as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            @foreach($product->Categories as $item)
                                {{$item->title}}
                            @endforeach
                        </td>
                        <td>
                            @if($product->status == 0)
                            <span class="label label-success">نمایش محصول</span>
                            @elseif($product->status == 1)
                            <span class="label label-danger">عدم نمایش</span>
                            @endif
                        </td>
                        <td>
                            @if($product->stock == 0)
                                <span class="label label-success">موجود</span>
                            @elseif($product->stock == 1)
                                <span class="label label-danger">عدم موجودی</span>
                            @endif
                        </td>
                        <td>
                            @if($product->vip == 1)
                                <span class="glyphicon glyphicon-check"></span>
                            @elseif($product->vip == 0)
                                <span class="glyphicon glyphicon-unchecked"></span>
                            @endif
                        </td>
                       @role('admin')
                        <td>{{$product['User']['username']}}</td>
                        @endrole
                        <td>{{$product->created_at}}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Picture"><button class="btn btn- btn-xs * show_img" data-title="Picture" id="show_img" data-toggle="modal" data-id="{{$product->id}}" data-target="#picture" ><span class="icon-picture"></span></button></p></td>
                        <td><a class="btn btn-primary btn-xs" href="/product/edit/{{$product->id}}"><span class="glyphicon glyphicon-pencil"></span></a> </td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="/product/delete/{{$product->id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a></p></td>
                    @endforeach
                    </tr>

                    </tbody>

                </table>

                <div class="clearfix"></div>
                {{ $pro->links() }}

            </div>

        </div>
    </div>


    <div class="modal fade" id="modal_picture" tabindex="0" role="dialog" aria-labelledby="picture" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">تصاویر محصول</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                      <span class="col-lg-3 col-sm-12 picture">
                          <span data-id="img_defualt" class="glyphicon glyphicon-remove red remove_img"></span>
                          <img id="img_defualt" class="img-thumbnail" src="#">
                          <span class="col-md-12 btn btn-success btn-upload-img">
                              <input id="btn_defualt" class="upload-hidden" type="file" />
                              <span>انتخاب عکس</span>
                          </span>
                      </span>
                      <span class="col-lg-3 col-sm-12 picture">
                          <span data-id="img1" class="glyphicon glyphicon-remove red remove_img"></span>
                          <img id="img1" class="img-thumbnail" src="#">
                           <span class="col-md-12 btn btn-success btn-upload-img">
                              <input id="btn_img1" class="upload-hidden" type="file" />
                              <span>انتخاب عکس</span>
                          </span>
                      </span>
                        <span class="col-lg-3 col-sm-12 picture">
                          <span data-id="img2" class="glyphicon glyphicon-remove red remove_img"></span>
                          <img id="img2" class="img-thumbnail" src="#">
                           <span class="col-md-12 btn btn-success btn-upload-img">
                              <input id="btn_img2" class="upload-hidden" type="file" />
                              <span>انتخاب عکس</span>
                          </span>
                      </span>
                        <span class="col-lg-3 col-sm-12 picture">
                          <span data-id="img3" class="glyphicon glyphicon-remove red remove_img"></span>
                          <img id="img3" class="img-thumbnail" src="#">
                           <span class="col-md-12 btn btn-success btn-upload-img">
                              <input id="btn_img3" class="upload-hidden" type="file" />
                              <span>انتخاب عکس</span>
                          </span>
                      </span>

                        <input id="hidden_id" type="hidden" name="_token" value="">

                    </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> بروزرسانی</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{--<div class="modal fade" id="modal_edit" tabindex="1" role="dialog" aria-labelledby="edit" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>--}}
                    {{--<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="form-group">--}}
                        {{--<label>نام محصول</label>--}}
                        {{--<input class="form-control" id="product_name" type="text" placeholder="">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label>قیمت محصول</label>--}}
                        {{--<input class="form-control" id="product_price" type="number" placeholder="">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label>وضعیت نمایش</label>--}}
                        {{--<select name="status" id="status" class="form-control input-sm m-bot15">--}}
                            {{--<option value="0">نمایش محصول</option>--}}
                            {{--<option value="1">عدم نمایش</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label>موجودی محصول</label>--}}
                        {{--<select name="stock" id="stock" class="form-control input-sm m-bot15">--}}
                            {{--<option value="0">موجود</option>--}}
                            {{--<option value="1">عدم موجودی</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label>توضیحات کوتاه محصول</label>--}}
                        {{--<textarea rows="2" class="form-control" id="short_des" placeholder=""></textarea>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label>توضیحات کامل محصول</label>--}}
                        {{--<textarea rows="2" class="form-control" id="des" placeholder=""></textarea>--}}
                    {{--</div>--}}
                    {{--<input type="hidden" name="v_id" id="v_id">--}}

                {{--</div>--}}
                {{--<div class="modal-footer ">--}}
                    {{--<button type="button" id="btn_edit" class="btn btn-shadow btn-success" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>بروز رسانی</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.modal-content -->--}}
        {{--</div>--}}
        {{--<!-- /.modal-dialog -->--}}
    {{--</div>--}}







@endsection