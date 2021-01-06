@extends('layouts.page')
@section('site_title')
Home page
@endsection

@section('header_class')
header header__transparent header-fixed
@endsection

@section('content')
<!-- hero -->
<div class="hero md-skin-dark bg-gradient">
	<div class="hero__before"><img src="assets/img/hero/item.png" alt=""/></div>
	<div class="hero__after"><img src="assets/img/hero/item2.png" alt=""/></div>
	<div class="hero__content">
		<div class="container">
			<div class="row content-wrapper">
				<div class="col-md-6 col-lg-4  content-item">

					<!--  -->
					<div class="hero__textbox"><span class="textbox__label">Getaco. </span>
						<h2 class="textbox__title">Giải pháp tối ưu giúp thu thập &  quản lý dữ liệu khách hàng</h2>
						<a class="md-btn textbox__btn md-btn--primary" href="#">khám phá
						</a>
					</div><!-- End /  -->

				</div>
				<div class="col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-2  content-item">
					<div class="hero__boximgae"><img src="assets/img/hero/box-image.png" alt=""/>

						<!-- popup -->
						<a class="popup hero__play" href="https://www.youtube.com/watch?v=XNqn4gEakQA" data-init="magnificPopup" data-effect="mfp-zoom-in" data-options='{"type":"iframe"}'><img src="assets/img/hero/icon-play.svg" alt=""/>
						</a><!-- End / popup -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero__svg">
		<svg width="1920" height="197.66" version="1.1" viewBox="0 0 1920 197.66" xmlns="http://www.w3.org/2000/svg">
			<title>Group 24</title>
			<desc>Created with Sketch.</desc>
			<path d="m0.12305 134.47v63.342h1919.9v-115.86c-11.578-2.7722-22.631-5.2325-33.848-7.791h-690.8c-11.779 2.4183-23.067 4.7702-35.781 7.3105-21.127 4.2214-43.389 8.5827-66.264 12.988-45.749 8.8112-93.949 17.801-140.44 26.203-46.487 8.4023-91.26 16.218-130.15 22.684-19.446 3.2329-37.423 6.1275-53.408 8.5898-15.985 2.4624-29.979 4.4913-41.461 5.9922-14.537 1.9002-29.113 3.6524-43.729 5.2539-14.615 1.6015-29.269 3.0526-43.963 4.3555-14.694 1.3028-29.427 2.4568-44.199 3.4609s-29.581 1.859-44.432 2.5644c-14.85 0.7055-29.739 1.2612-44.668 1.668s-29.897 0.66529-44.904 0.77344c-15.007 0.10815-30.052 0.0675-45.137-0.12305-15.085-0.19053-30.21-0.53033-45.373-1.0195s-30.368-1.1281-45.609-1.916c-15.242-0.78788-30.522-1.726-45.842-2.8125-15.32-1.0866-30.68-2.3218-46.078-3.707-15.398-1.3852-30.834-2.9196-46.311-4.6035-15.476-1.6839-30.992-3.5174-46.547-5.5s-31.148-4.1152-46.781-6.3965c-15.633-2.2813-31.306-4.7111-47.018-7.291-15.667-2.5727-31.372-5.2944-47.117-8.1641z" fill="#fff" style="paint-order:stroke markers fill"/>
			<path d="m1557.7 0.0055553c-102.98 0.42296-193.51 10.867-338.69 41.318-146.7 30.77-399.61 76.57-491.18 88.607-258.98 34.045-501.59 27.857-727.84-18.568v23.086c252.63 46.058 495.25 53.885 727.84 23.482 91.859-12.007 344.47-57.837 491.18-88.607 145.18-30.451 235.71-40.895 338.69-41.318 89.771-0.3687 210.54 17.615 362.29 53.951v-28c-151.76-36.336-272.52-54.32-362.29-53.951z" fill="#e63351"/>
			<path d="m1557.7 28.006c-102.98 0.42296-193.51 10.867-338.69 41.318-146.7 30.77-399.32 76.6-491.18 88.607-232.59 30.402-475.21 22.575-727.84-23.482v24.094c321.13 48.688 602.18 51.929 843.14 9.7226 71.945-12.602 224.73-35.674 380.95-66.059 172.21-33.495 298.27-18.632 360.71-13.227 101.86 8.8177 213.6 35.247 335.2 79.285v-86.309c-151.76-36.336-272.52-54.32-362.29-53.951z" fill="#c9334d"/>
		</svg>
	</div>
</div><!-- End / hero -->


<!-- Section -->
<section class="md-section about-home">
	<div class="container">
		<div class="row display-flex">
			<div class="col-md-4 col-lg-4  align-self wow fadeInLeft" data-wow-duration="0.4s" data-wow-delay="0.2s">

				<!--  -->
				<div><span class="textbox__label">Getaco. </span>
					<h2 class="textbox__title">Bạn có đang bỏ lỡ khách hàng tiềm năng?</h2>
					<div class="textbox__text">
						<p>Nếu không có chiến lược chuyển đổi chuyên nghiệp, rất nhiều doanh nghiệp sẽ đánh mất hơn 90% lượng khách hàng tiềm năng trong quá trình tiếp cận và tìm hiểu.</p>
						<p>Getaco là giải pháp hoàn hảo cho quy trình quản lý khách hàng - bộ công cụ giúp mọi doanh nghiệp thúc đẩy lượng đăng ký, kiểm soát thông tin, phân tích dữ liệu và tương tác với khách hàng một cách hiệu quả nhất.</p>
					</div>
					<a class="md-btn textbox__btn md-btn--primary" href="#">khám phá
					</a>
				</div><!-- End /  -->

			</div>
			<div class="col-md-8 col-lg-8  align-self wow fadeInRight" data-wow-duration="0.4s" data-wow-delay="0.4s"><img src="assets/img/about/graphic.svg" alt="">
			</div>
		</div><span class="about-home-image" data-enllax-ratio="0.2" data-enllax-type="foreground" data-enllax-direction="vertical"><img src="assets/img/about/avatar.png" alt=""></span><span class="about-home-image-2" data-enllax-ratio="-0.2" data-enllax-type="foreground" data-enllax-direction="horizontal"><img src="assets/img/about/avatar-blur2.png" alt=""></span><span class="about-home-image-3" data-enllax-ratio="0.2" data-enllax-type="foreground" data-enllax-direction="horizontal"><img src="assets/img/about/avatar-blur3.png" alt=""></span><span class="about-home-image-4" data-enllax-ratio="0.2" data-enllax-type="foreground" data-enllax-direction="vertical"><img src="assets/img/about/avatar-blur4.png" alt=""></span>
	</div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 ">

				<!-- title -->
				<div class="title wow fadeInLeft" data-wow-duration="0.4s" data-wow-delay="0.2s">
					<h2 class="title__title">Tính năng nổi bật</h2>
				</div><!-- End / title -->

			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-4 ">

				<!-- featured -->
				<div class="featured wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
					<div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon1.svg" alt=""/></span>
						<h3 class="featured__title" data-number-line="2">Tính năng nổi bật</h3>
						<p class="featured__text">Tối ưu hóa việc sử dụng thông tin khách hàng với hệ thống phân tích tổng hợp và giao diện trực quan</p>
					</div>
				</div><!-- End / featured -->

			</div>
			<div class="col-sm-6 col-md-6 col-lg-4 ">

				<!-- featured -->
				<div class="featured wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.4s">
					<div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon2.svg" alt=""/></span>
						<h3 class="featured__title" data-number-line="2">Tạo form biểu mẫu thu thập thông tin</h3>
						<p class="featured__text">Gia tăng hiệu quả thu thập dữ liệu khách hàng bằng đa dạng các loại form đăng ký linh động và thu hút</p>
					</div>
				</div><!-- End / featured -->

			</div>
			<div class="col-sm-6 col-md-6 col-lg-4 col-xs-offset-0 col-sm-offset-3 col-md-offset-3 col-lg-offset-0 ">

				<!-- featured -->
				<div class="featured wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.6s">
					<div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon3.svg" alt=""/></span>
						<h3 class="featured__title" data-number-line="2">Thống kê tương tác, báo cáo hiệu quả</h3>
						<p class="featured__text">Theo dõi, đánh giá kết quả hoạt động và tương tác khách hàng với hệ thống phân tích thông minh</p>
					</div>
				</div><!-- End / featured -->

			</div>
		</div>
		<div class="md-text-center md-btn-wrapper wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
			<a class="md-btn md-btn--primary" href="{{ url('/register') }}">Đăng ký dùng thử
			</a>
			<a class="md-btn md-btn--outline-primary" href="{{ action('PageController@feature') }}">xem tất cả tính năng
			</a>
		</div>
	</div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0 pb-0"><img src="assets/img/svg/svg2.svg" alt="">
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section" style="background-color:#F9F9F9;">
	<div class="container">
		<div class="row">
			<div class="col-lg-6  wow fadeInLeft" data-wow-duration="0.4s" data-wow-delay="0.2s">

				<!--  -->
				<div>
					<h2 class="textbox__title">Nhiều phương thức thu thập thông tin khách hàng</h2>
				</div><!-- End /  -->

			</div>
			<div class="col-lg-6  wow fadeInRight" data-wow-duration="0.4s" data-wow-delay="0.4s">
				<p>Getaco hỗ trợ bạn thu thập thông tin khách hàng với các loại form đăng ký linh động, tương thích với nhiều kênh chạm cùng những công cụ khác trong chiến dịch kinh doanh của doanh nghiệp. Chúng tôi cam kết cung cấp một trải nghiệm liền mạch, tự nhiên cho cả bạn và khách hàng của bạn.</p>
			</div>
		</div>
	</div>
	<div class="mb-60"></div>
	<div class="view-box-wapper wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.4s">

		<!-- swiper__module swiper-container -->
		<div class="swiper__module swiper-container" data-options='{"loop":true,"slidesPerView":6,"spaceBetween":30,"autoplay":{"delay":2500,"disableOnInteraction":false},"breakpoints":{"550":{"slidesPerView":1,"spaceBetween":20},"700":{"slidesPerView":2,"spaceBetween":20},"991":{"slidesPerView":3,"spaceBetween":30},"1200":{"slidesPerView":4,"spaceBetween":30},"1400":{"slidesPerView":5,"spaceBetween":30}}}'>
			<div class="swiper-wrapper">

				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Popup khi cuộn trang</span>
					<div class="view-box__img"><img src="assets/img/grid-view/1.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Form liên hệ</span>
					<div class="view-box__img"><img src="assets/img/grid-view/2.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Form download tài liệu</span>
					<div class="view-box__img"><img src="assets/img/grid-view/3.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Tương thích mạng xã hội</span>
					<div class="view-box__img"><img src="assets/img/grid-view/4.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Form liên hệ</span>
					<div class="view-box__img"><img src="assets/img/grid-view/5.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Đăng ký nhận thông tin</span>
					<div class="view-box__img"><img src="assets/img/grid-view/6.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Tải tài liệu</span>
					<div class="view-box__img"><img src="assets/img/grid-view/7.png" alt=""/></div>
				</div><!-- End / view-box -->


				<!-- view-box -->
				<div class="view-box"><span class="view-box__title">Tương thích với mạng xã hội</span>
					<div class="view-box__img"><img src="assets/img/grid-view/8.png" alt=""/></div>
				</div><!-- End / view-box -->

			</div>
		</div><!-- End / swiper__module swiper-container -->

	</div>
	<div class="md-text-center md-btn-wrapper wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
		<a class="md-btn md-btn--primary" target="_blank" href="https://docs.google.com/document/d/1dhyiEV6FVgK5p4lZTNUcN_kzY-9ZFUE6fw5V7xyyfkQ/edit">download tài liệu <i class="fa fa-file-pdf-o"></i>
		</a>
	</div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0 pb-0" style="background-color:#F9F9F9;"><img src="assets/img/svg/svg3.svg" alt="">
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section md-skin-dark pt-60 pb-60 bg-gradient" style="background-color:#ff4669;">
	<div class="fix-full-container">
		<div class="row display-flex">
			<div class="col-lg-3  align-self col-lg-push-7">

				<!--  -->
				<div>
					<h2 class="textbox__title">Biến khách hàng tiềm năng thành người sử dụng</h2>
				</div><!-- End /  -->

				<p>Getaco - giải pháp toàn diện giúp doanh nghiệp quản lý quá trình thu hút và chuyển đổi khách hàng một cách hiệu quả nhất: Tối ưu hóa những nỗ lực Marketing với các loại form đăng ký xuất hiện đúng thời điểm, giúp dễ dàng biến người xem trang thành lead chất lượng cho đội ngũ Sales &amp; dễ dàng tiếp cận, thuyết phục và chuyển đổi khách hàng tiềm năng nhờ hệ thống quản lý thông tin và phân tích hành vi người dùng của Getaco.</p>
				<a class="md-btn mt-40 md-btn--primary md-btn--light " href="{{ url('/register') }}">Đăng ký trải nghiệm ngay
				</a>
			</div>
			<div class="col-lg-9  align-self col-lg-pull-3"><img src="assets/img/step/1.svg" alt="">
			</div>
		</div>
	</div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0 pb-0" style="background-color:#F9F9F9;"><img src="assets/img/svg/svg4.svg" alt="">
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-3 ">

				<!-- title -->
				<div class="title md-text-center">
					<h2 class="title__title">Những lĩnh vực áp dụng hiệu quả nhất</h2>
				</div><!-- End / title -->

			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/1.svg" alt=""/></span>
							<h3 class="service-01__title">Bất đông sản</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
					<a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/2.svg" alt=""/></span>
							<h3 class="service-01__title">o tô xe máy</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div>
					</a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.30000000000000004s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/3.svg" alt=""/></span>
							<h3 class="service-01__title">Du lịch - Khách sạn</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.4s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/4.svg" alt=""/></span>
							<h3 class="service-01__title">Nhà hàng - coffee</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.5s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/5.svg" alt=""/></span>
							<h3 class="service-01__title">Sức khoẻ & làm đẹp</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.6000000000000001s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/6.svg" alt=""/></span>
							<h3 class="service-01__title">Tư vấn luật - Đầu tư</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.7000000000000001s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/7.svg" alt=""/></span>
							<h3 class="service-01__title">Dịch vụ giáo dục</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">

				<!-- service-01 -->
				<div class="service-01 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.8s"><a class="service-01__body">
					<div class="md-tb">
						<div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/8.svg" alt=""/></span>
							<h3 class="service-01__title">Truyền thông - tiếp thị</h3>
							{{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
						</div>
					</div></a>
				</div><!-- End / service-01 -->

			</div>
		</div>
	</div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
	<div class="container">

		<!-- cta-form -->
		<div class="cta-form">
			<h2 class="cta-form__title">Chưa rõ Getaco có phù hợp với lĩnh vực kinh doanh của bạn hay không? <br>Vui lòng để lại thông tin, Getaco sẽ tư vấn giúp bạn:</h2>
			
			<form class="cta-form__form getacoForm __getacoFormInline" action="{{
                     URL::action('CustomerController@saveEmbedData') 
                }}"  method="POST" id="__getAco_216">
				{{ csrf_field() }}
				<input type="hidden" name="id_company" value="1">
				<input type="hidden" name="id_form" value="216">
				<input type="hidden" name="form_show" value="0">
				<input type="hidden" name="from_url" value="">

				<!-- form-item -->
				<div class="form-item">
					<?php 
						use App\Orbit;
						$orbits = Orbit::all();
					?>
					<select name="customer_attr[field_203_47]" required>
						<option value="" selected disabled>Lĩnh vực hoạt động</option>
						@foreach($orbits as $orbit)
						<option value="{{$orbit->orbit}}">{{$orbit->orbit}}</option>
						@endforeach
						<option value="Lĩnh vực khác">Lĩnh vực khác</option>
					</select>
				</div><!-- End / form-item -->


				<!-- form-item -->
				<div class="form-item">
					<input class="form-control" type="text" autocomplete="off" name="customer_email" placeholder="Email" required/>
				</div><!-- End / form-item -->


				<!-- form-item -->
				<div class="form-item">
					<button type="submit" class="md-btn md-btn--primary md-btn--block">tôi muốn được tư vấn</button>
				</div><!-- End / form-item -->
				<div class="row field_frontend"></div>

			</form>
		</div><!-- End / cta-form -->

	</div>
</section>
<!-- End / Section -->

{{-- 
<!-- Section -->
<section class="md-section pt-0 pb-0"><img src="assets/img/svg/svg5.svg" alt="">
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-3 ">

				<!-- title -->
				<div class="title md-text-center">
					<h2 class="title__title">Bảng giá dịch vụ</h2>
				</div><!-- End / title -->

			</div>
		</div>
		<div class="row">
			@foreach ($packages as $index => $package)
			<div class="col-lg-4 ">

				<!-- pricing -->
				<div class="pricing wow 
				@if($index == 0) {{' fadeInLeft'}} @endif
				@if($index == 2) {{' fadeInRight'}} @endif
				@if($index == 1) {{' fadeInUp'}} @endif
				@if($package->status === 'highlight') {{' pricing__featured '}} @endif
				" data-wow-duration="0.4s" data-wow-delay="0.2s">

					@if($package->status === 'highlight')
						<div class="pricing__header">Gói phổ biến</div>
					@endif
					<div class="pricing__inner">
						<span class="pricing__name">{{ 
							$package->name 
						}}</span>
						<div class="pricing__price"><span class="price">{{
							number_format($package['origin_price'], 0)
							}}</span><span class="amout">đ</span>
							<span class="unit">/ th</span>
						</div>
						<ul class="pricing__list">
							@foreach ($package->feature as $num => $feature )
							<li><span class="pricing__status"></span>{{ $feature->name }}</li>
							@endforeach
						</ul>
						<div class="pricing__btn">
							<a class="md-btn md-btn--primary md-btn--md " href="{{ 
								action('PackageController@order') 
								}}?id={{ $package->id_package }}">dùng thử
							</a>
						</div>
						<div class="pricing__info">
							<p>Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
						</div>
					</div>
				</div><!-- End / pricing -->
			</div>
		@endforeach
	</div>
<div class="md-text-center mt-30 wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
	<a class="md-btn md-btn--outline-primary " href="{{ action('PageController@diff') }}#xemthemtinhnang">So sánh các gói
	</a>
</div>
</div>
</section>
<!-- End / Section --> --}}


<!-- cta -->
<section class="cta md-skin-dark bg-gradient">
	<div class="container">
		<div class="cta__inner">
			<div class="row">
				<div class="col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-6 col-lg-offset-6 ">
					<h2 class="cta__title">Bạn đã sẵn sàng để ngừng đánh mất khách hàng và thất thoát doanh thu?</h2>
					<p class="cta__text"><b>Trải nghiệm 30 ngày sử dụng miễn phí</b> để tối ưu hóa những nỗ lực kinh doanh của doanh nghiệp bạn: tăng khách hàng, tăng hiệu quả, tăng lợi nhuận</p>
					<a class="md-btn md-btn--light" href="{{ url('/register') }}">Đăng ký dùng thử ngay bây giờ
					</a>
				</div>
			</div>
		</div>
		<div class="cta__img" style="background-image: url(assets/img/cta/cta.png);"><img src="assets/img/cta/cta.png" alt=""/></div>
	</div>
</section><!-- End / cta -->
@endsection

@section('extra_footer')
<script src="https://getaco.com/form-embed/js?id=216"></script>
@endsection