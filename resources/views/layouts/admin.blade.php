<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logogetaco/logo.png') }}"/>
    <title>Admin - Getaco.</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,800" rel="stylesheet">
    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/css/layout2.css') }}"> -->
    @yield('extra_header')
</head>
<style>
.container{
    margin: 0px;
    width: 100% !important;
}
</style>
<body id="getaco" class="getacoEmbed">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Customer Admin</h3>
                <strong>CA</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ URL::action('HomeController@admin') }}">
                        <img src="{{ asset('icon/artboard-copy-65.png') }}" alt="">
                        <strong>Home</strong>
                    </a>
                </li>
                
                <li class="{{ Request::is('admin/company*') ? 'active' : '' }}">
                    <a href="#customerList" data-toggle="collapse" aria-expanded="false">
                        <img src="{{ asset('icon/artboard-copy-64.png') }}" alt="">
                        <strong>Customer</strong>
                    </a>
                    <ul class="collapse list-unstyled" id="customerList">
                        <li><a href="{{ action('CompanyController@index') }}">Customer</a></li>

                    </ul>
                </li>
                
                <li class="{{ Request::is('admin/form*') ? 'active' : '' }}">
                    <a href="#formSubmenu" data-toggle="collapse" aria-expanded="false">
                        <img src="{{ asset('icon/artboard-copy-56.png') }}" alt="">
                        <strong>Form</strong>
                    </a>
                </li>

                <li class="{{ Request::is('admin/package') ? 'active' : '' }}">
                    <a href="#packageSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-th-large"></i>
                        <strong>Package</strong>
                    </a>
                    <ul class="collapse list-unstyled" id="packageSubmenu">
                        <li><a href="{{ URL::action('PackageController@index') }}">List Package</a></li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/package/order*') ? 'active' : '' }}">
                    <a href="#orderSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <strong>Order</strong>
                    </a>
                    <ul class="collapse list-unstyled" id="orderSubmenu">
                        <!-- <li><a href="{{ URL::action('OrderController@list_order') }}">Oder</a></li> -->
                        <li><a href="{{ URL::action('OrderController@bought') }}">Bought</a></li>
                    </ul>
                </li>

                <!-- <li class="{{ Request::is('admin/partner*') ? 'active' : '' }}">
                    <a href="{{ action('PartnerController@index') }}">
                        <i class="fas fa-handshake"></i>
                        <strong>Partner</strong>
                    </a>
                </li> -->

                <li  class="{{ Request::is('admin/coupon*') ? 'active' : '' }}">
                    <a href="#couponSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-gift"></i>
                        <strong>Coupon</strong>
                    </a>
                    <ul class="collapse list-unstyled" id="couponSubmenu">
                        <li><a href="{{ URL::action('CouponController@index') }}">List Coupon</a></li>
                    </ul>
                </li>
                <li  class="{{ Request::is('admin/business*') ? 'active' : '' }}">
                    <a href="{{ URL::action('OrbitController@index') }}">
                        <i class="fa fa-gift"></i>
                        <strong>Business</strong>
                    </a>
                </li>

                <!-- <li class="{{ Request::is('admin/report*') ? 'active' : '' }}">
                    <a href="#rpSubmenu" data-toggle="collapse" aria-expanded="false">
                        <img src="{{ asset('icon/artboard-copy-58.png') }}" alt="">
                        <strong>Report</strong>
                    </a>
                </li> -->

            </ul>

        </nav>

        <!-- Page Content Holder -->
        <div id="content" class="">
            <div class="container-fluid menu-primary">
                <div class="col-md-2 dropdown text-center">
                    <a href="#" class=" btn btn_drop_down">ALL CUSTOMER<img src="" alt=""></a>
                    
                </div>
                <div class="col-md-6 search-menu">
                    <div class="box">
                        <!-- <form action="#" method="POST"> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input name="key" type="search" id="search" class="search autocomplete" placeholder="Search customer" />
                        <!-- </form> -->
                    </div>
                </div>
                <div class="col-md-2 add_cus_menu_top">
                    <a href="#" class="btn btn-primary-menu text-right text-uppercase">
                        <svg  width="10" height="10" viewBox="0 0 10 10">
                            <path id="plus" fill="#FF4669" fill-rule="nonzero" d="M5.875 4.125H10v1.75H5.875V10h-1.75V5.875H0v-1.75h4.125V0h1.75z"/>
                        </svg>
                    Add lead</a>
                </div>
                <div class="col-md-2 user-menu">

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <svg  width="30" height="30" viewBox="0 0 30 30">
                                    <circle cx="1864" cy="1660" r="15" fill="#888" fill-rule="evenodd" transform="translate(-1849 -1645)"/>
                                </svg>
                            </a>

                            <ul class="dropdown-menu">
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
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    addClassSidebar();
    $(window).resize(function() {
        addClassSidebar();
    });

    function addClassSidebar(){
        var b = $('body').width();
        if (b <= 1369) {
            $('#sidebar').addClass('active');
        }else{
            $('#sidebar').removeClass('active');
        }
    }
</script>
@yield('extra_footer')
</body>
</html>
