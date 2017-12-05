<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('img/favicon.html')}}">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/panel/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/panel/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/style-responsive.css') }}" rel="stylesheet">
    <!--external css-->

    <link href="{{ asset('css/panel/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ asset('css/panel/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ asset('css/panel/jquery.bootstrap.treeselect.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/panel/croppie.css') }}" rel="stylesheet" type="text/css"/>


    <style>
        @font-face {
            font-family: 'yekan';
            src: url('{{asset('fonts/BYekan/BYekan.eot?#iefix')}}') format('embedded-opentype'),   url('{{asset('fonts/BYekan/BYekan.woff')}}') format('woff'),  url('{{asset('fonts/BYekan/BYekan.ttf')}}')  format('truetype'), url('{{asset('fonts/BYekan/BYekan.svg#BYekan+')}}') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        th {
            text-align: center;
        }
        tr{
            text-align: center;
        }
        .upload-hidden
        {
            position:absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .custom-file-input {
            color: transparent;
        }
        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'عکس را انتحاب کنید ...';
            color: black;
            display: inline-block;
            background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }
        .custom-file-input:hover::before {
            border-color: black;
        }
        .custom-file-input:active {
            outline: 0;
        }
        .custom-file-input:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/panel/html5shiv.js') }}"></script>
    <script src="{{ asset('js/panel/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

<section id="container">
    <!--header start-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @if($errors->any())

        <div class="alert alert-danger" id="alert_dialog" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span></span>

                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
        </div>
    @endif
    @if(Session::get('success'))
        <div class="alert alert-success" id="alert_dialog_success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span></span>
            {!! Session::get('success') !!}
        </div>
    @endif

    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo">فلت<span>لب</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge bg-success">6</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">شما 6 برنامه در دست کار دارید</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">پنل مدیریت</div>
                                    <div class="percent">40%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">بروزرسانی دیتابیس</div>
                                    <div class="percent">60%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">برنامه نویسی  IPhone</div>
                                    <div class="percent">87%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                        <span class="sr-only">87% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">برنامه موبایل</div>
                                    <div class="percent">33%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                        <span class="sr-only">33% Complete (danger)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">پروفایل v1.3</div>
                                    <div class="percent">45%</div>
                                </div>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>

                            </a>
                        </li>
                        <li class="external">
                            <a href="#">برنامه های بیشتر</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope-alt"></i>
                        <span class="badge bg-important">5</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">شما 5 پیام جدید دارید</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{asset('img/avatar-mini.jpg')}}"></span>
                                <span class="subject">
                                    <span class="from">سجاد باقرزاده</span>
                                    <span class="time">همین حالا</span>
                                    </span>
                                <span class="message">
                                        سلام،متن پیام نمایشی جهت تست
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="img/avatar-mini2.jpg"></span>
                                <span class="subject">
                                    <span class="from">ایمان مدائنی</span>
                                    <span class="time">10 دقیقه قبل</span>
                                    </span>
                                <span class="message">
                                     سلام، چطوری شما؟
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="img/avatar-mini3.jpg"></span>
                                <span class="subject">
                                    <span class="from">صبا ذاکر</span>
                                    <span class="time">3 ساعت قبل</span>
                                    </span>
                                <span class="message">
                                        چه پنل مدیریتی فوق العاده ایی
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="img/avatar-mini4.jpg"></span>
                                <span class="subject">
                                    <span class="from">مسعود شریفی</span>
                                    <span class="time">همین حالا</span>
                                    </span>
                                <span class="message">
                                        سلام،متن پیام نمایشی جهت تست
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">نمایش تمامی پیام ها</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="icon-bell-alt"></i>
                        <span class="badge bg-warning">7</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">شما 7 اعلام جدید دارید</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="icon-bolt"></i></span>
                                سرور شماره 3 توقف کرده
                                <span class="small italic">34 دقیقه قبل</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="icon-bell"></i></span>
                                سرور شماره 4 بارگزاری نمی شود
                                <span class="small italic">1 ساعت قبل</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="icon-bolt"></i></span>
                                پنل مدیریت 24% پیشرفت داشته است
                                <span class="small italic">4 ساعت قبل</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="icon-plus"></i></span>
                                ثبت نام کاربر جدید
                                <span class="small italic">همین حالا</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                برنامه پیام خطا دارد
                                <span class="small italic">10 دقیقه قبل</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">نمایش تمامی اعلام ها</a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{asset('img/panel/avatar1_small.jpg')}}">
                        <span class="username">سجاد باقرزاده</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                        <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                        <li><a href="#"><i class="icon-bell-alt"></i> اعلام ها</a></li>
                        <li><a href="/logout"><i class="icon-key"></i> خروج</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="index.html">
                        <i class="icon-dashboard"></i>
                        <span>صفحه اصلی</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>محصولات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="/product">نمایش محصولات</a></li>
                        <li><a class="" href="/category">دسته بندی ها</a></li>
                        <li><a class="" href="widget.html">تخفیف ها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="/comment" class="">
                        <i class="icon-comments-alt"></i>
                        <span>نظرات</span>
                        <span class="label label-danger pull-left mail-info">2</span>
                    </a>

                </li>
                <li class="sub-menu">
                    <a href="/" class="">
                        <i class="icon-external-link-sign"></i>
                        <span>لینک های مفید</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="/question" class="">
                        <i class="icon-question"></i>
                        <span>سوالات متداول</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="" href="/page">
                        <i class="icon-file"></i>
                        <span>صفحات </span>
                    </a>
                </li>
                <li>
                    <a class="" href="/article">
                        <i class="icon-copy"></i>
                        <span>مقاله ها </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-list-ol"></i>
                        <span>نظر سنجی</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="widget.html">نمایش نظر سنجی ها</a></li>
                        <li><a class="" href="general.html">نمایش نتایج نظر سنجی</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="/customer">
                        <i class="icon-user"></i>
                        <span>مشتری ها</span>
                    </a>
                </li>
                @role('admin')
                <li>
                    <a class="" href="login.html">
                        <i class="icon-group"></i>
                        <span>کابران و سطح دسترسی</span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="widget.html"> کاربران</a></li>
                        <li><a class="" href="general.html">سطح دسترسی</a></li>
                    </ul>
                </li>
                @endrole
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>
    <!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/panel/jquery.js') }}"></script>
<script src="{{ asset('js/panel/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('js/panel/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/panel/app.js') }}"></script>
<script src="{{asset('js/panel/croppie.js')}}"></script>
<script src="{{ asset('js/panel/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/panel/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/panel/jquery.sparkline.js') }}"></script>
<script src="{{ asset('css/panel/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/panel/owl.carousel.js') }}"></script>
<script src="{{ asset('js/panel/jquery.customSelect.min.js') }}"></script>
<script src="{{ asset('js/panel/sparkline-chart.js') }}"></script>
<script src="{{ asset('js/panel/easy-pie-chart.js') }}"></script>
<script type="text/javascript" src="{{asset('js/panel/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('js/panel/DT_bootstrap.js')}}"></script>
<script src="{{ asset('js/panel/common-scripts.js') }}"></script>
<script src="{{asset('js/panel/dynamic-table.js')}}"></script>
<script src="{{asset('js/panel/jquery.bootstrap.treeselect.js')}}"></script>
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

<script type="text/javascript">
    /*$(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>پیش نمایش</strong>"+$(closebtn)[0].outerHTML,
            content: "There's no image",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function (){
            var img = $('<img/>', {
                id: 'dynamic',
                width:250,
                height:200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("تغییر");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });*/
    tinymce.init({
        entity_encoding : "raw",
        selector: "textarea",
        language : 'fa',
        plugins : 'link',
        menubar:false,
        statusbar: false,
        height: 300,
        plugins : 'advlist autolink link lists preview',
        paste_auto_cleanup_on_paste : true,
        paste_postprocess : function(pl, o) {
            o.node.innerHTML = o.node.innerHTML.replace(/&nbsp;/ig, " ");
        }
    });
</script>




<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });



</script>

<script>

    window.setTimeout(function() {
        $("#alert_dialog").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
    window.setTimeout(function() {
        $("#alert_dialog_success").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>

</body>
</html>
