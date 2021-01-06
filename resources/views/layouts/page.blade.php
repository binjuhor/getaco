<!DOCTYPE html>
<html>
	<head>
		<title>@yield('site_title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="shortcut icon" type="image/png" href="{{ asset('/images/logogetaco/logo.png') }}"/>
		<!-- Fonts-->
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/fonts/fontawesome/font-awesome.min.css') }}">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/bootstrap/grid.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/swiper4.7/swiper.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/magnific-popup/magnific-popup.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/wow/animate.css') }}">
		<!-- App & fonts-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Open+Sans:300,400,500">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="{{ asset('/assets/css/main.css') }}">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        @yield('extra_header')
	</head>
	
	<body id="getaco" class="getacoEmbed">
		<div class="page-wrap" id="root">
			
			<!-- menu-mobile -->
			<div class="menu-mobile fixhome">
				<ul class="menu-mobile__list">
					<li class="menu-item-current"><a href="">Home</a></li>
					<li><a href="{{ action('PageController@blog') }}">giới thiệu</a></li>
					<li><a href="{{ action('PageController@feature') }}">tính năng</a></li>
					<!-- <li><a href="{{ action('PageController@pricing') }}">bảng giá</a></li> -->
					{{-- <li class="menu-item-has-children">
						<a href="#">giải pháp cho</a>
						<i class="fa fa-angle-down toggle-submenu"></i>
						<ul class="sub-menu">
							<li><a href="#">Giải pháp 1</a></li>
							<li><a href="#">Giải pháp 2</a></li>
							<li><a href="#">Giải pháp 3</a></li>
						</ul>
					</li> --}}
					
				</ul>
			</div><!-- End / menu-mobile -->
			
			
			<!-- header -->
			<header class="@yield('header_class')">
				<div class="header__inner">
					<div class="header__logo">
						<a class="header-logo-basic" href="{{ action('PageController@index') }}">
							<img src="{{ asset('/assets/img/logo-red.png') }}" alt=""/>
						</a>
						<a class="header-logo-while" href="{{ action('PageController@index') }}">
							<img src="{{ asset('/assets/img/logo.png') }}" alt=""/>
						</a>
					</div>
					<ul class="header-menu">
						<li class="menu-item-current"><a href="/">Home</a></li>
						<li class="menu-item-has-children">
							<a href="{{ action('PageController@blog') }}">giới thiệu</a>
						</li>
						<li><a href="{{ action('PageController@feature') }}">tính năng</a></li>
						<!-- <li><a href="{{ action('PageController@pricing') }}">bảng giá</a></li> -->
						{{-- <li class="menu-item-has-children">
							<a href="#">Giải pháp cho<i class="fa fa-angle-down"></i></a>
							<ul class="sub-menu">
								<li><a href="#">Giải pháp 1</a></li>
								<li><a href="#">Giải pháp 2</a></li>
								<li><a href="#">Giải pháp 3</a></li>
							</ul>
						</li> --}}
					</ul>
					<div class="header__flexspace"></div>
					<div class="header__login">
						<a href="{{ url('/login') }}"">ĐĂNG NHẬP</a>
					</div>
					<div class="header__register">
						<a class="header__btn md-btn md-btn--primary" href="{{ url('/register') }}">Đăng ký dùng thử</a>
					</div>
					<div class="navbar-toggle"><span></span><span></span><span></span></div>
				</div>
				<div class="header__process"></div>
			</header><!-- End / header -->
			
			<!-- Content-->
			<div class="md-content">
				
				@yield('content')
				
			</div>
			<!-- End / Content-->
			
			<!-- footer -->
			<div class="footer">
				<div class="footer__inner">
					<div class="container">
						<div class="row row-eq-height">
							<div class="col-sm-6 col-md-6 getaco_col-lg-3 ">
								
								<!-- widget -->
								<div class="widget">
									<div class="footer__logo"><img src="{{ asset('/assets/img/logo-red.png') }}" alt=""/></div>
									<div class="footer__social">
										
										<!-- social-icon -->
										<a class="social-icon social-icon__style-02" href="#"><i class="social-icon__icon fa fa-facebook"></i>
										</a><!-- End / social-icon -->
										
										
										<!-- social-icon -->
										<a class="social-icon social-icon__style-02" href="#"><i class="social-icon__icon fa fa-twitter"></i>
										</a><!-- End / social-icon -->
										
										
										<!-- social-icon -->
										<a class="social-icon social-icon__style-02" href="#"><i class="social-icon__icon fa fa-instagram"></i>
										</a><!-- End / social-icon -->
										
									</div>
									<p class="mb-0">Getaco là giải pháp hoàn hảo cho quy trình quản lý khách hàng - bộ công cụ giúp mọi doanh nghiệp thúc đẩy lượng đăng ký, kiểm soát thông tin, phân tích dữ liệu và tương tác với khách hàng một cách hiệu quả nhất.</p>
								</div><!-- End / widget -->
								
							</div>
							{{-- <div class="col-sm-6 col-md-6 col-lg-2 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 ">
								
								<!-- widget -->
								<div class="widget">
									<h3 class="widget-title null">Trợ giúp</h3>
									
									<!-- widget-list -->
									<ul class="widget-list">
										<li><a href="{{ url('/register') }}">Đăng ký dùng thử</a></li>
										<li><a href="{{ action('PageController@pricing') }}">Xem bảng giá</a></li>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">Chính sách</a></li>
									</ul><!-- End /  widget-list -->
									
								</div><!-- End / widget -->
								
							</div> --}}
							{{-- <div class="col-sm-6 col-md-6 col-lg-3 ">
								
								<!-- widget -->
								<div class="widget">
									<h3 class="widget-title null">Đặc tính nổi bật</h3>
									
									<!-- widget-list -->
									<ul class="widget-list">
										<li><a href="#">Lightbox Popup</a></li>
										<li><a href="#">Công nghệ Exit-Intent®</a></li>
										<li><a href="#">Mat chào mừng toàn màn hình</a></li>
										<li><a href="#">Thanh nổi</a></li>
										<li><a href="#">Hộp cuộn trượt</a></li>
										<li><a href="#">Các mẫu nội tuyến</a></li>
										<li><a href="#">Thử nghiệm A / B</a></li>
										<li><a href="#">Analytics Chuyển đổi</a></li>
									</ul><!-- End /  widget-list -->
									
								</div><!-- End / widget -->
								
							</div> --}}
							<div class="col-sm-6 col-md-6 getaco_col-lg-3 ">
								
								<!-- widget -->
								<div class="widget">
									<p>Đăng ký để được cập nhật những tính năng mới nhất, các ưu đãi đặc biệt cùng nhiều bí quyết tiếp thị và quản lý khách hàng từ Getaco</p>
									
									<!-- form-sub -->
									<form class="form-sub getacoForm __getacoFormInline" id="__getAco_221">
										<input type="hidden" name="id_company" value="1">
										<input type="hidden" name="id_form" value="221">
										<input type="hidden" name="form_show" value="0">
										<input type="hidden" name="from_url" value="">
										<input class="form-sub__input" type="email" autocomplete="off"  name="customer_email" placeholder="Nhận thông tin qua Email"/>
										<button class="form-sub__submit" type="submit" style="height:50px;"><i class="fa fa-arrow-right"></i></button>
										<div class="row field_frontend"></div>
									</form><!-- End / form-sub -->
									
								</div><!-- End / widget -->
								
							</div>
						</div>
					</div>
				</div>
				<div class="footer__footer">
					<div class="container">
						<div class="md-tb">
							<div class="md-tb__cell footer-item">
								<ul class="footer__contact">
									<li><span>Hotline: </span><a href="#">+84.869 291 771</a></li>
									<li><span>Email: </span><a href="#">support@getaco.com</a></li>
								</ul>
							</div>
							<div class="md-tb__cell footer-item">
								<p class="footer__copyright">2018 &copy; Copyright Getaco. All rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End / footer -->
			
		</div>
		<!-- Vendors-->
		<script type="text/javascript" src="{{ asset('/assets/vendors/_jquery/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/menu/menu.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/headroom/headroom.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/swiper4.7/swiper.jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/accordion/awe-accordion.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery-one-page/jquery.nav.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/isotope-layout/isotope.pkgd.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery.countTo/jquery.countTo.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery.countdown/jquery.countdown.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery.matchHeight/jquery.matchHeight.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/masonry-layout/masonry.pkgd.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery.waypoints/jquery.waypoints.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery-one-page/jquery.nav.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/jquery.scrollTo/jquery.scrollTo.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/wow/wow.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/tabs/awe-tabs.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/assets/vendors/enllax/jquery.enllax.min.js') }}"></script>
		<!-- App-->
		<script type="text/javascript" src="{{ asset('/assets/js/main.js') }}"></script>
		<script src="https://getaco.com/form-embed/js?id=221"></script>
        @yield('extra_footer')
	</body>
</html>