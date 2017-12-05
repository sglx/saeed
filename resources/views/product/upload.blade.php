
@extends('layouts.panel')
@section('content')

<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <div class="panel crop">
           <div class="panel-body">
            <div id="upload-demo"></div>
            <a style="position: relative" class="btn file-btn">
                <input  type="file" id="upload"  class="custom-file-input" accept="image/*" />
            </a>
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-offset-1 col-lg-6">
      <div class="alert-success">
        <label style="margin: 10px">نتیجه نهایی</label>
      </div>
        <div class="panel crop">
            <div class="panel-body">
                <div id="result"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel crop">
            <div class="panel-body">
                <select required name="pic" id="pic" class="form-control input-sm m-bot15">
                        <option value="0">تصویر اصلی محصول</option>
                        <option value="1">تصویر اول محصول</option>
                        <option value="2">تصویر دوم محصول</option>
                        <option value="3">تصویر سوم محصول</option>
                </select>

                <button type="submit" class="upload-result btn btn-success btn-sm" name="send_pic" id="send_pic">ارسال</button>
            </div>
        </div>
    </div>
</div>

@endsection