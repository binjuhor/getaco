@extends('layouts.page')

@section('site_title')
Trang tính năng
@endsection

@section('header_class')
header header__transparent header-fixed
@endsection

@section('content')
<!-- page-title -->
<div class="page-title bg-gradient">
    <div class="page-title__content">
        <div class="container">
            <h2 class="page-title__title">Tính năng</h2>
        </div>
    </div>
    <div class="page-title__svg">
        <svg width="1920" height="197.66" version="1.1" viewBox="0 0 1920 197.66" xmlns="http://www.w3.org/2000/svg">
            <title>Group 24</title>
            <desc>Created with Sketch.</desc>
            <path d="m0.12305 134.47v63.342h1919.9v-115.86c-11.578-2.7722-22.631-5.2325-33.848-7.791h-690.8c-11.779 2.4183-23.067 4.7702-35.781 7.3105-21.127 4.2214-43.389 8.5827-66.264 12.988-45.749 8.8112-93.949 17.801-140.44 26.203-46.487 8.4023-91.26 16.218-130.15 22.684-19.446 3.2329-37.423 6.1275-53.408 8.5898-15.985 2.4624-29.979 4.4913-41.461 5.9922-14.537 1.9002-29.113 3.6524-43.729 5.2539-14.615 1.6015-29.269 3.0526-43.963 4.3555-14.694 1.3028-29.427 2.4568-44.199 3.4609s-29.581 1.859-44.432 2.5644c-14.85 0.7055-29.739 1.2612-44.668 1.668s-29.897 0.66529-44.904 0.77344c-15.007 0.10815-30.052 0.0675-45.137-0.12305-15.085-0.19053-30.21-0.53033-45.373-1.0195s-30.368-1.1281-45.609-1.916c-15.242-0.78788-30.522-1.726-45.842-2.8125-15.32-1.0866-30.68-2.3218-46.078-3.707-15.398-1.3852-30.834-2.9196-46.311-4.6035-15.476-1.6839-30.992-3.5174-46.547-5.5s-31.148-4.1152-46.781-6.3965c-15.633-2.2813-31.306-4.7111-47.018-7.291-15.667-2.5727-31.372-5.2944-47.117-8.1641z" fill="#fff" style="paint-order:stroke markers fill"/>
            <path d="m1557.7 0.0055553c-102.98 0.42296-193.51 10.867-338.69 41.318-146.7 30.77-399.61 76.57-491.18 88.607-258.98 34.045-501.59 27.857-727.84-18.568v23.086c252.63 46.058 495.25 53.885 727.84 23.482 91.859-12.007 344.47-57.837 491.18-88.607 145.18-30.451 235.71-40.895 338.69-41.318 89.771-0.3687 210.54 17.615 362.29 53.951v-28c-151.76-36.336-272.52-54.32-362.29-53.951z" fill="#e63351"/>
            <path d="m1557.7 28.006c-102.98 0.42296-193.51 10.867-338.69 41.318-146.7 30.77-399.32 76.6-491.18 88.607-232.59 30.402-475.21 22.575-727.84-23.482v24.094c321.13 48.688 602.18 51.929 843.14 9.7226 71.945-12.602 224.73-35.674 380.95-66.059 172.21-33.495 298.27-18.632 360.71-13.227 101.86 8.8177 213.6 35.247 335.2 79.285v-86.309c-151.76-36.336-272.52-54.32-362.29-53.951z" fill="#c9334d"/>
        </svg>
    </div>
</div><!-- End / page-title -->


<!-- Section -->
<section class="md-section">
    <div class="container">
        <div class="list-function">
            <ul class="list-function__list">
                <li><a href="#function"><img src="assets/img/list-tab/1.svg" alt=""><span>Tạo form</span></a></li>
                <li><a href="#function2"><img src="assets/img/list-tab/2.svg" alt=""><span>Quản lý dữ liệu</span></a></li>
                <li><a href="#function3"><img src="assets/img/list-tab/3.svg" alt=""><span>Thông kê và báo cáo</span></a></li>
                <li><a href="#function4"><img src="assets/img/list-tab/4.svg" alt=""><span>Thử nghiệm A/B</span></a></li>
                <li><a href="#function5"><img src="assets/img/list-tab/4.svg" alt=""><span>Các tính năng khác</span></a></li>
            </ul>
        </div>
        
        <!-- grid-list -->
        <div class="grid-list" id="function">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list1.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/1.svg" alt=""/></span>
                        <h3 class="grid-list__title">Tạo form biểu mẫu thu thập thông tin</h3>
                        <p class="grid-list__text">Công cụ tạo form linh động tương thích với nhiều loại nội dung trên trang giúp bạn tạo ra những biểu mẫu phù hợp với doanh nghiệp và thu hút khách hàng mà hoàn toàn không cần có kỹ năng lập trình hay thiết kế.</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- grid-list -->
        <div class="grid-list" id="function2">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  align-self col-lg-push-7">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list2.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  col-lg-pull-4 align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/2.svg" alt=""/></span>
                        <h3 class="grid-list__title">Quản lý dữ liệu khách hàng tập trung</h3>
                        <p class="grid-list__text">Hệ thống lưu trữ tổng hợp thông tin khách hàng được thu thập từ nhiều kênh giúp cho việc quản lý, theo dõi và chăm sóc từng đối tượng khách hàng riêng biệt trở nên thuận tiện hơn</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- grid-list -->
        <div class="grid-list" id="function3">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list3.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/3.svg" alt=""/></span>
                        <h3 class="grid-list__title">Thống kê tương tác, báo cáo hiệu quả</h3>
                        <p class="grid-list__text">Phần mềm đưa ra báo cáo đầy đủ, chi tiết giúp doanh nghiệp có được tầm nhìn bao quát và đồng thời theo dõi sát sao hiệu quả của hoạt động kinh doanh với các chỉ số về lượt xem, lượt click, tỷ lệ dời trang, tỷ lệ chuyển đổi,…</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- grid-list -->
        <div class="grid-list" id="function4">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  align-self col-lg-push-7">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list4.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  col-lg-pull-4 align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/4.svg" alt=""/></span>
                        <h3 class="grid-list__title">Thử nghiệm A/B</h3>
                        <p class="grid-list__text">Cho phép so sánh tính hiệu quả về tương tác người dùng giữa hai phiên bản thiết kế, nội dung hay trải nghiệm để doanh nghiệp có thể tối ưu hóa giải pháp và tăng khả năng thu hút khách hàng</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- grid-list -->
        <div class="grid-list mb-0" id="function5">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list4.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/3.svg" alt=""/></span>
                        <h3 class="grid-list__title">Thống kê tương tác, báo cáo hiệu quả</h3>
                        <p class="grid-list__text">Phần mềm đưa ra báo cáo đầy đủ, chi tiết giúp doanh nghiệp có được tầm nhìn bao quát và đồng thời theo dõi sát sao hiệu quả của hoạt động kinh doanh với các chỉ số về lượt xem, lượt click, tỷ lệ dời trang, tỷ lệ chuyển đổi,…</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
    </div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
    <div class="container">
        
        <!-- cta-02 -->
        <div class="cta-02 bg-gradient md-skin-dark">
            <div class="cta-02__svg"><img src="assets/img/cta/cta2.svg" alt=""/></div>
            <div class="row">
                <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-3 ">
                    <h2 class="cta-02__title">Chỉ cần 60 giây cài đặt, Getaco sẽ giúp doanh nghiệp tăng 30% lượng khách hàng ngay trong tuần đầu tiên!</h2>
                    <a class="md-btn md-btn--light" href="{{ url('/register') }}">Đăng ký dùng thử ngay
                    </a>
                </div>
            </div>
        </div><!-- End / cta-02 -->
        
    </div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 ">
                
                <!-- title -->
                <div class="title">
                    <h2 class="title__title">Một số tính năng khác</h2>
                </div><!-- End / title -->
                
            </div>
        </div>
        <div class="row row-eq-height">
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon4.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Forms Multi Steps</h3>
                        <p class="featured__text">Biểu mẫu có quy trình cho phép khách hàng có thể chia nhỏ thông tin và trình bày biểu mẫu theo lần lượt từng bước đơn giản hơn</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon5.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Split tests</h3>
                        <p class="featured__text">Thử nghiệm phân tách với nhiều biến số và nhiều phương án khác nhau để có thể tối ưu hóa trang một cách cụ thể, chi tiết hơn</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon6.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Interaction Tracking</h3>
                        <p class="featured__text">Theo dõi nhiều loại tương tác của khách hàng hiện tại và tiềm năng để hiểu rõ hành vi cùng nhu cầu tiềm ẩn</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon7.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Lightbox Popups</h3>
                        <p class="featured__text">Cửa sổ popup hiện lên ở chính giữa màn hình trong khi toàn bộ nội dung trang phía sau được làm mờ hoặc tối đi , thu hút toàn bộ sự chú ý của người xem trang vào biểu mẫu trong popup và yêu cầu thao tác chọn , diền hoặc tắt thông tin để tiếp tục sử dụng</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon8.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Floating Bar</h3>
                        <p class="featured__text">Cửa sổ popup hiện lên ở chính giữa màn hình trong khi toàn bộ nội dung trang phía sau được làm mờ hoặc tối đi , thu hút toàn bộ sự chú ý của người xem trang vào biểu mẫu trong popup và yêu cầu thao tác chọn , diền hoặc tắt thông tin để tiếp tục sử dụng</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon9.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Sidebar</h3>
                        <p class="featured__text">Bảng chứa thông tin hoặc biểu mẫu được đăt tại vị trí cột phụ hiển thị song song với nội dung như một phần của trang</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon10.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Slide-in Scroll Box</h3>
                        <p class="featured__text">Thanh trượt gồm bảng thông tin hoặc biểu mẫu xuất hiện ở góc màn hình khi người xem đã theo dõi đến một điểm định sẵn trên trang, cho một trải nghiệm mượt mà nhưng vẫn đủ nổi bật để thu hút sự chú ý của người xem</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon11.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Mobile Specific Popups</h3>
                        <p class="featured__text">Cửa sổ popup dưới dạng tối ưu hóa về kích thước và tốc độ dành riêng cho các thiết bị di động như điện thoại, tablet,.. </p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon12.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Full screen take over</h3>
                        <p class="featured__text">Cửa sổ popup hiện bao trùm toàn màn hình để giảm thiểu tối đa các yếu tố có thể gây sao nhãng, yêu cầu thao tác điền form hoặc lựa chọn thông tin mới có thể tiếp tục xem trang và sử dụng</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon13.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Scroll Triggering</h3>
                        <p class="featured__text">Hiển thị biểu mẫu hoặc cửa sổ pop-up khi khách hàng đã xem ít nhất X% của trang hay đến một điểm nhất định, cho phép bạn thu hút sự chú ý của những người đang thật sự theo dõi và quan tâm mà không tạo cảm giác làm phiền ngay từ khi mới vào trang</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon14.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Contact Mangement</h3>
                        <p class="featured__text">Hệ thống thu thập, lưu trữ và phân tích thông tin liên hệ khách hàng, giúp kết nối khách hàng với bộ phận hỗ trợ khách hàng của doanh nghiệp, nâng cao trải nghiệm người dùng và tăng khả năng chuyển đổi</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon15.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Lead Management</h3>
                        <p class="featured__text">Đánh giá, chọn lọc và phân cấp khách hàng tiềm năng để có chiến lược chăm sóc riêng với từng đối tượng khách hàng khác nhau</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon16.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Customer Segment</h3>
                        <p class="featured__text">Phân chia tập khách hàng thành các phân khúc nhỏ tập trung với các nhu cầu và hành vi khác nhau để xây dựng chiến lược tiếp cận chuyên sâu phù hợp</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon17.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Analytic Dashboard</h3>
                        <p class="featured__text">Báo cáo phân tích tổng quan với khả năng xử lý khối lượng dữ liệu lớn, giúp doanh nghiệp điều tra xu hướng và nghiên cứu kết quả</p>
                    </div>
                </div><!-- End / featured -->
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 ">
                
                <!-- featured -->
                <div class="featured">
                    <div class="featured__body"><span class="featured__icon"><img src="assets/img/featured/icon12.svg" alt=""/></span>
                        <h3 class="featured__title" data-number-line="2">Exit-Intent Popup </h3>
                        <p class="featured__text">Công nghệ Exit-intent cho bạn cơ hội thứ hai để tiếp cận khách hàng khi hiển thị biểu mẫu hoặc cửa sổ pop-up với nội dung thu hút vào chính xác thời điểm họ chuẩn bị rời trang để tái thiết lập sự chú ý của người xem</p>
                    </div>
                </div><!-- End / featured -->
                
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
