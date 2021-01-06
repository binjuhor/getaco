<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logogetaco/logo.png') }}"/>
    <title>App - Getaco</title>
    <!-- fontawesome -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form_theme/form-template.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form_embed.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/rippler.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }

    .text-info:hover{
        color: #006699;
        border-bottom: 1px solid #006699;
    }


</style>
@yield('extra_header')
</head>

<body id="getaco" class="getacoEmbed">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="z-index: 1051">
            <div class="sidebar-container">

                <div class="main-sidebar">
                    <div class="sidebar-header">
                        <img src="" alt="" style="margin-bottom:10px ">
                    </div>

                    <ul class="list-unstyled components">
                        <li class="{{ Request::is('app') ? 'active' : '' }}">
                            <a href="{{ URL::action('HomeController@home') }}">
                                <img src="{{ asset('icon/artboard-copy-65.png') }}" alt=""><br>
                                <strong>HOME</strong>
                            </a>
                        </li>

                        <li class="{{ Request::is('app/customer*') ? 'active' : '' }}">
                            @can('Customer')
                            <a href="#customerList" data-toggle="collapse" aria-expanded="false">
                                <img src="{{ asset('icon/artboard-copy-64.png') }}" alt=""><br>
                                <strong>MANAGEMENT</strong>
                            </a>
                            @endcan
                            <ul class="collapse list-unstyled" id="customerList">
                                @can('all_lead')<li class="{{ Request::is('app/customer') ? 'active' : '' }}">
                                    <a href="{{ URL::action('CustomerController@index') }}">All leads</a>
                                </li>@endcan
                                @can('ctm_list')<li class="{{ Request::is('app/customer/customer') ? 'active' : '' }}">
                                    <a href="{{ URL::action('CustomerController@customer') }}">Customer list</a>
                                </li>@endcan
                                @can('seg_list')<li class="{{ Request::is('app/customer/segment/list') ? 'active' : '' }}">
                                    <a href="{{ URL::action('SegmentController@index') }}">Segment </a>
                                </li>@endcan
                                @can('atb_list')<li class="{{ Request::is('app/customer/attribute') ? 'active' : '' }}">
                                    <a href="{{ URL::action('CustomerAttributeController@index') }}">Attribute</a>
                                </li>@endcan
                                @can('stt_list')<li class="{{ Request::is('app/customer/tag/list') ? 'active' : '' }}">
                                    <a href="{{ URL::action('TagController@index') }}">Status</a>
                                </li>@endcan
                            </ul>
                        </li>

                        <li class="{{ Request::is('app/form*') ? 'active' : '' }}">
                            @can('Form')
                            <a href="#formSubmenu" data-toggle="collapse" aria-expanded="false">
                                <img src="{{ asset('icon/artboard-copy-56.png') }}" alt=""><br>
                                <strong>FORM</strong>
                            </a>
                            @endcan
                            <ul class="collapse list-unstyled" id="formSubmenu">

                                @can('form_list')<li class="{{ Request::is('app/form') ? 'active' : '' }}" ><a href="{{ URL::action('FormController@index') }}">All Forms</a></li>@endcan
                                @can('form_new')<li class="{{ Request::is('app/form/build_form') ? 'active' : '' }}"><a href="{{ URL::action('FormController@buildForm') }}">New Form</a></li>@endcan
                                @can('form_temp')<li class="{{ Request::is('app/form/template') ? 'active' : '' }}"><a href="{{ URL::action('TemplateFormController@index') }}">Form Templates</a></li>@endcan
                            </ul>
                        </li>

                        <li class="{{ Request::is('app/report*') ? 'active' : '' }}">
                            @can('Report')
                            <a href="#rpSubmenu" data-toggle="collapse" aria-expanded="false">
                                <img src="{{ asset('icon/artboard-copy-58.png') }}" alt=""><br>
                                <strong>REPORT</strong>
                            </a>
                            @endcan
                            <ul class="collapse list-unstyled" id="rpSubmenu">
                                @can('convert')<li class="{{ Request::is('app/report/convert') ? 'active' : '' }}">
                                    <a href="{{ URL::action('ReportController@convert') }}">Convert</a>
                                </li>@endcan
                                @can('analytics')<li class="{{ Request::is('app/report/analytic') ? 'active' : '' }}">
                                    <a href="{{ URL::action('ReportController@analytics') }}">Analytics</a>
                                </li>@endcan
                            </ul>
                        </li>

                        <li class="{{ Request::is('app/user*') ? 'active' : '' }}">
                            @can('User')
                            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false">
                                <img src="{{ asset('icon/artboard-copy-62.png') }}" alt=""><br>
                                <strong>USER</strong>
                            </a>
                            @endcan
                            <ul class="collapse list-unstyled" id="userSubmenu">
                                @can('user_list')<li class="{{ Request::is('app/user/list') ? 'active' : '' }}">
                                    <a href="{{ URL::action('PermissionController@list') }}">All Users</a>
                                </li>@endcan
                                @can('Role')<li class="{{ Request::is('app/user/permission') ? 'active' : '' }}">
                                    <a href="{{ URL::action('PermissionController@index') }}">Roles</a>
                                </li>@endcan
                                @can('user_htr')
                                <li class="{{ Request::is('app/user/history') ? 'active' : '' }}">
                                    <a href="{{ URL::action('PermissionController@history') }}">User history</a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                        <li class="{{ Request::is('app/setting/info') ? 'active' : '' }}">
                            <a href="{{ URL::action('HomeController@info') }}">
                                <img src="{{ asset('icon/artboard-copy-60.png') }}" alt=""><br>
                                <strong>SETTINGS</strong>
                            </a>
                        </li>
                        <li class="{{ Request::is('app/document*') ? 'active' : '' }}">
                           
                            <a target="_blank" href="https://docs.getaco.com">
                                <img src="{{ asset('iconSVG/folder-1792.svg') }}" alt="" style="padding-left: 6px;padding-right: 6px;"><br>
                                <strong>DOCUMENTS</strong>
                            </a>
                        </li>
                    </ul>

                        <div class="upgrade text-center hidden">
                            <p>Unlock more powerful features</p>
                            <button type="submit" class=" btn_upgrade" style="margin-left: 10px"><img src="" alt="">UPGRADE TO PRO</button>
                        </div>
                    </div>

                </div>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" class="">
                <div class="row container-fluid menu-primary">
                    <div class="col-md-2 dropdown text-center box_drop_down_menu">
                        <a href="javascript:void(0)" class=" btn btn_drop_down">ALL CUSTOMER<img src="" alt=""></a>
                        @if(isset(Auth::User()->id_company))
                            <?php
                            $segments = DB::table('segments')->where('id_company', '=', Auth::User()->id_company)->get();
                            ?>
                            <div class="row dropdown-content" style="margin:-7px 0 0 -18px">
                                @foreach($segments as $val)
                                    <a href="{{ route('shortcut_fillter') }}?id={{ $val->id_segment }}">{{ $val->segment_name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6 search-menu">
                        <div class="box">
                            <form action="{{ URL::action('SearchController@search_basic') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="key" type="search" id="search" class="search autocomplete" placeholder="Search customer" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 text-right add_cus_menu_top">
                        <a href="{{action('CustomerController@add')}}" class="btn btn-primary-menu text-right text-uppercase">
                            <svg  width="10" height="10" viewBox="0 0 10 10">
                                <path id="plus" fill="#FF4669" fill-rule="nonzero" d="M5.875 4.125H10v1.75H5.875V10h-1.75V5.875H0v-1.75h4.125V0h1.75z"/>
                            </svg>
                            Add lead</a>
                    </div>
                    <div class="col-md-1 user-menu">
                            <div class="notification" style="display: none">
                            </div>
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="background-image:url( {{Auth::user()->avatar }});">
                                    
                                </a>

                                <ul class="dropdown-menu user_drop_menu">
                                    <li class="name">
                                        <a href="{{ URL::action('HomeController@info') }}">
                                            <span class="name">{{ Auth::user()->name }}</span>
                                            @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 10)
                                                <?php $text = "owner" ?>
                                            @elseif(Auth::user()->id_role == 0)
                                                <?php $text = "admin" ?>
                                            @elseif(Auth::user()->id_role == 2)
                                                <?php $text = "high" ?>
                                            @elseif(Auth::user()->id_role == 3)
                                                <?php $text = "medium" ?>
                                            @elseif(Auth::user()->id_role == 4)
                                                <?php $text = "low" ?>
                                            @else
                                                <?php $text = "N/A" ?>
                                            @endif
                                            <p>Permissions &nbsp;&nbsp;<i class="label">{{ $text }}</i></p>
                                        </a>
                                    </li>
                                    <li class="toggle">
                                        <a href="{{ URL::action('HomeController@edit')}}">Account Setting</a>
                                    </li>
                                    <li class="toggle">
                                        <a target="_blank" href="https://docs.google.com/document/d/1dhyiEV6FVgK5p4lZTNUcN_kzY-9ZFUE6fw5V7xyyfkQ/edit">Get Help</a>
                                    </li>
                                    <li class="toggle">
                                        <a href="">Privacy policy</a>
                                    </li>
                                    <li class="toggle">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="container-fluid content_layout">
                @yield('content')
                @yield('element_group')
            </div>
        </div>

    </div>
    <!-- thong bao het han -->
    <!-- Modal -->
    <div class="modal fade" id="modalexpiry" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Gói của bạn đã hết hạn</h4>
          </div>
          <div class="modal-body">
              <p>Bạn vui lòng gian hạn gói để có trải nghiệm tốt hơn !</p>
          </div>
          <div class="modal-footer">
              <marquee width="100%"><h3 style="color: #ff4669;">App - Getaco</h3></marquee>
          </div>
      </div>
      
  </div>
</div>

<!-- end thong bao het han -->

<!-- xac nhan xoa -->
    <div class="modal fade" id="submit_delete" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content content_note" style="padding: 20px 30px">
                <div class="text-center text_content" style="margin: 20px 0;font-weight:bold;color:#888888">Bạn chắc chắn muốn xóa ?</div>
                <div class="button row" style="margin: 0 auto">
                    <div class="yes col-sm-6" style="text-align: center;">
                        <a href="" id="submit_action_delete" class="btn btn-primary btn-yes" style="height: 30px;font-size:14px;line-height: 30px;" >YES</a>
                    </div>
                    <div class="no col-sm-6" style="text-align: center;">
                        <button class="btn btn_back btn-no " style="height: 30px;font-size:14px;line-height: 30px;" data-dismiss="modal" >NO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end xac nhan xoa -->
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
<script src="{{asset('/js/rippler.js')}}"></script>
<script>
    $('.btn').rippler();

    var rippler = $().rippler({
        selector : '.btn',
        color : "rgba(254,154,238,.4)"
    });

    $('body').on('click','.action_delete',function(){
        var url = $(this).attr('url_action_delete');
        $('#submit_action_delete').attr("href",url);
        $('#submit_delete').modal('show');
    })

</script>
<script type="text/javascript">
    (function($){
        "use strict";
        $(document).ready(function () {
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
            $('.components li').click(function(){
                $('.components li').removeClass('active');
                $('a[aria-expanded="true"]').attr('aria-expanded',false);
                $('ul').attr('aria-expanded',false).removeClass('in');
                $(this).addClass('active');
            })
        });
        addClassSidebar();
        $(window).resize(function() {
            addClassSidebar();
        });

        function addClassSidebar(){
            var b = $('body').width();
            if (b <= 1447) {
                $('#sidebar').addClass('active');
            }else{
                $('#sidebar').removeClass('active');
            }
        }

        <?php
        use App\Http\Controllers\ExpirydayController;
        $a = new ExpirydayController();
        $b = $a->Check();
        if($b == 0){?>
            $(document).ready(function () {
                $("#modalexpiry").modal({backdrop: 'static', keyboard: false},'show');
            });
        <?php } ?>
    })(jQuery)

</script>
@yield('extra_footer')
</body>
</html>
