@extends('layouts.page')

@section('page_title')
So sánh giá
@endsection

@section('header_class')
header header__fixheader header-fixed
@endsection

@section('content')
<!-- Section -->
<section class="md-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ">
                
                <!-- title -->
                <div class="title">
                    <h2 class="title__title">Bảng giá</h2>
                </div><!-- End / title -->
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                
                <!-- pricing -->
                <div class="pricing">
                    <div class="pricing__inner"><span class="pricing__name">plus</span>
                        <div class="pricing__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                        <ul class="pricing__list">
                            <li><span class="pricing__status"></span>Tạo biểu mẫu không giới hạn</li>
                            <li><span class="pricing__status"></span>Thử nghiệm A/B</li>
                            <li><span class="pricing__status"></span>Theo dõi tương tác</li>
                            <li><span class="pricing__status"></span>Báo cáo phân tích tổng quan</li>
                            <li><span class="pricing__status"></span>Công nghệ Exit-Intent</li>
                        </ul>
                        <div class="pricing__btn">
                            <a class="md-btn md-btn--primary md-btn--md " href="#">dùng thử
                            </a>
                        </div>
                        <div class="pricing__info">
                            <p>Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                        </div>
                    </div>
                </div><!-- End / pricing -->
                
            </div>
            <div class="col-lg-4 ">
                
                <!-- pricing -->
                <div class="pricing pricing__featured">
                    <div class="pricing__header">Gói phổ biến</div>
                    <div class="pricing__inner"><span class="pricing__name">plus</span>
                        <div class="pricing__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                        <ul class="pricing__list">
                            <li><span class="pricing__status"></span>Tạo biểu mẫu không giới hạn
                            </li>
                            <li><span class="pricing__status"></span>Thử nghiệm A/B
                            </li>
                            <li><span class="pricing__status"></span>Theo dõi tương tác
                            </li>
                            <li><span class="pricing__status"></span>Báo cáo phân tích tổng quan
                            </li>
                            <li><span class="pricing__status"></span>Công nghệ Exit-Intent
                            </li>
                            <li><span class="pricing__status"></span>Định vị mục tiêu theo trang riêng biệt
                            </li>
                            <li><span class="pricing__status"></span>Quản lý chiến dịch
                            </li>
                            <li><span class="pricing__status"></span>Đánh giá khách hàng tiềm năng
                            </li>
                            <li><span class="pricing__status"></span>Hiển thị biểu mẫu thông minh
                            </li>
                            <li><span class="pricing__status"></span>Quản lý theo khu vực địa lý
                            </li>
                            <li><span class="pricing__status"></span>Quản lý quy trình định vị khách hàng tiềm năng
                            </li>
                        </ul>
                        <div class="pricing__btn">
                            <a class="md-btn md-btn--primary md-btn--md " href="#">mua gói
                            </a>
                        </div>
                        <div class="pricing__info">
                            <p>Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                        </div>
                    </div>
                </div><!-- End / pricing -->
                
            </div>
            <div class="col-lg-4 ">
                
                <!-- pricing -->
                <div class="pricing">
                    <div class="pricing__inner"><span class="pricing__name">plus</span>
                        <div class="pricing__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                        <ul class="pricing__list">
                            <li><span class="pricing__status"></span>Tạo biểu mẫu không giới hạn</li>
                            <li><span class="pricing__status"></span>Thử nghiệm A/B</li>
                            <li><span class="pricing__status"></span>Theo dõi tương tác</li>
                            <li><span class="pricing__status"></span>Báo cáo phân tích tổng quan</li>
                            <li><span class="pricing__status"></span>Công nghệ Exit-Intent</li>
                        </ul>
                        <div class="pricing__btn">
                            <a class="md-btn md-btn--primary md-btn--md " href="#">dùng thử
                            </a>
                        </div>
                        <div class="pricing__info">
                            <p>Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                        </div>
                    </div>
                </div><!-- End / pricing -->
                
            </div>
        </div>
        <div class="md-text-center">
            <h6 class="upppercase fz-12">Xem bảng tính năng đầy đủ</h6>
            <a class="md-btn md-btn--sm md-btn--outline-primary " href="{{ action('PageController@feature') }}">Xem thêm các tính năng
            </a>
        </div>
    </div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ">
                
                <!-- title -->
                <div class="title">
                    <h2 class="title__title">Hãy để chúng tôi giúp doanh nghiệp của bạn tăng cao doanh số và hiệu quả kinh doanh</h2>
                </div><!-- End / title -->
                
            </div>
        </div>
        
        <!-- table-pricing -->
        <div class="table-pricing">
            <table class="table-pricing__table">
                <thead>
                    <tr>
                        <th colspan="1"></th>
                        <th class="table-header" colspan="1">
                            <h3 class="table-header__name">Basic</h3>
                            <div class="table-header__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                            <p class="table-header__text">Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                            <a class="md-btn table-header__btn md-btn--primary md-btn--md md-btn--block " href="#">Mua gói
                            </a>
                            <p class="table-header__info">Miễn phí dùng thử 30 ngày</p>
                        </th>
                        <th class="table-header table-featured" colspan="1">
                            <div class="table-header__title">Gói phổ biến nhất</div>
                            <h3 class="table-header__name">Basic</h3>
                            <div class="table-header__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                            <p class="table-header__text">Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                            <a class="md-btn table-header__btn md-btn--primary md-btn--md md-btn--block " href="#">Mua gói
                            </a>
                            <p class="table-header__info">Miễn phí dùng thử 30 ngày</p>
                        </th>
                        <th class="table-header" colspan="1">
                            <h3 class="table-header__name">Basic</h3>
                            <div class="table-header__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                            <p class="table-header__text">Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                            <a class="md-btn table-header__btn md-btn--primary md-btn--md md-btn--block " href="#">Mua gói
                            </a>
                            <p class="table-header__info">Miễn phí dùng thử 30 ngày</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Coupon</td>
                        <td> <i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Request Demo</td>
                        <td> </td>
                        <td class="table-featured"></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Thu thập thông tin khách hàng</td>
                        <td> </td>
                        <td class="table-featured"></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Thiết lập mẫu thông tin</td>
                        <td> <i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Biểu mẫu có quy trình</td>
                        <td> <i class="fa fa-check"></i></td>
                        <td class="table-featured"> <i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Biểu mẫu có điều kiện</td>
                        <td></td>
                        <td class="table-featured"> </td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Quản lý chiến dịch</td>
                        <td></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Thử nghiệm phiên bản A/B</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Thử nghiệm phân tích</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Định vị mục tiêu theo ....</td>
                        <td></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Thống kê &amp; Phân tích</td>
                        <td> </td>
                        <td class="table-featured"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Theo dõi tương tác</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Phân tích cơ hội bán hàng</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Đánh giá khách hàng tiềm năng</td>
                        <td></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Phân tích dữ liệu</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kiểu hiển thị biểu mẫu</td>
                        <td> </td>
                        <td class="table-featured"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Popup sáng</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Cố định khi cuộn trang</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Hiển thị bên cột phụ</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Thanh trượt ở góc màn hình</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Popup tương thích thiết bị D Đ</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Popup toàn màn hình</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Hiển thị biểu mẫu thông minh</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sau thời gian xem trang nhất định</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Khi cuộn trang xuống</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Khi thoát trang</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Hiển thị trên nhiều trang liên quan</td>
                        <td></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Theo chiến dịch</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Quản lý thông tin khách hàng</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Quản lý thông tin liên hệ</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Nuôi dưỡng khách hàng tiềm năng</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Quản lý cơ hội bán hàng</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Quản lý khách hàng tiềm năng</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Quản lý phân khúc khách hàng</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Quản lý theo khu vực địa lý</td>
                        <td></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Nhập/xuất dữ liệu</td>
                        <td><i class="fa fa-check"></i></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Quản lý quy trình bán hàng</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Quy trình định vị khách hàng tiềm năng</td>
                        <td></td>
                        <td class="table-featured"><i class="fa fa-check"></i></td>
                        <td> <i class="fa fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>Đa quy trình bán hàng</td>
                        <td></td>
                        <td class="table-featured"></td>
                        <td> </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td class="table-foot">
                            <div class="table-foot__price"><span class="price">190.000đ / tháng</span></div>
                            <a class="md-btn md-btn--primary md-btn--md md-btn--block " href="#">Dùng thử
                            </a>
                        </td>
                        <td class="table-foot table-featured">
                            <div class="table-foot__price"><span class="price">190.000đ / tháng</span></div>
                            <a class="md-btn md-btn--primary md-btn--md md-btn--block " href="#">Dùng thử
                            </a>
                        </td>
                        <td class="table-foot">
                            <div class="table-foot__price"><span class="price">190.000đ / tháng</span></div>
                            <a class="md-btn md-btn--primary md-btn--md md-btn--block " href="#">Dùng thử
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="table-pricing__mobile">
                <div class="table-mobile-item">
                    <div class="table-mobile-wrapper">
                        <div class="mobile-table-header">
                            <div class="mobile-table-header__body">
                                <h3 class="table-header__name">Basic</h3>
                                <div class="table-header__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                                <p class="table-header__text">Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                                <a class="md-btn table-header__btn md-btn--primary md-btn--md " href="#">Mua gói
                                </a>
                                <p class="table-header__info">Miễn phí dùng thử 30 ngày</p>
                            </div>
                        </div>
                        <div class="mobile-table-content">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Coupon</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Request Demo</td>
                                        <td> </td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Thu thập thông tin khách hàng</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Thiết lập mẫu thông tin</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Biểu mẫu có quy trình</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Biểu mẫu có điều kiện</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý chiến dịch</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Thử nghiệm phiên bản A/B</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Thử nghiệm phân tích</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Định vị mục tiêu theo ....</td>
                                        <td></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Thống kê &amp; Phân tích</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Theo dõi tương tác</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Phân tích cơ hội bán hàng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Phân tích dữ liệu</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Kiểu hiển thị biểu mẫu</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Popup sáng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Cố định khi cuộn trang</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hiển thị bên cột phụ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Thanh trượt ở góc màn hình</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Popup tương thích thiết bị D Đ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Popup toàn màn hình</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Hiển thị biểu mẫu thông minh</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Sau thời gian xem trang nhất định</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Khi cuộn trang xuống</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Khi thoát trang</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hiển thị trên nhiều trang liên quan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Theo chiến dịch</td>
                                        <td></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Quản lý thông tin khách hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý thông tin liên hệ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Nuôi dưỡng khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý cơ hội bán hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý khách hàng tiềm năng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý phân khúc khách hàng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý theo khu vực địa lý</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Nhập/xuất dữ liệu</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Quản lý quy trình bán hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quy trình định vị khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Đa quy trình bán hàng</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mobile-table-toogle-content"> <span class="toogle-text-show">Chi tiết gói<i class="fa fa-angle-down"></i></span><span class="toogle-text-hide">Thu gọn gói<i class="fa fa-angle-up"></i></span></div>
                </div>
                <div class="table-mobile-item table-mobile-featured">
                    <div class="table-mobile-wrapper">
                        <div class="mobile-table-header">
                            <div class="table-header__title">Gói phổ biến</div>
                            <div class="mobile-table-header__body">
                                <h3 class="table-header__name">Basic</h3>
                                <div class="table-header__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                                <p class="table-header__text">Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                                <a class="md-btn table-header__btn md-btn--primary md-btn--md " href="#">Mua gói
                                </a>
                                <p class="table-header__info">Miễn phí dùng thử 30 ngày</p>
                            </div>
                        </div>
                        <div class="mobile-table-content">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Coupon</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Request Demo</td>
                                        <td> </td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Thu thập thông tin khách hàng</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Thiết lập mẫu thông tin</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Biểu mẫu có quy trình</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Biểu mẫu có điều kiện</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý chiến dịch</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Thử nghiệm phiên bản A/B</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Thử nghiệm phân tích</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Định vị mục tiêu theo ....</td>
                                        <td></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Thống kê &amp; Phân tích</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Theo dõi tương tác</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Phân tích cơ hội bán hàng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Phân tích dữ liệu</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Kiểu hiển thị biểu mẫu</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Popup sáng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Cố định khi cuộn trang</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hiển thị bên cột phụ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Thanh trượt ở góc màn hình</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Popup tương thích thiết bị D Đ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Popup toàn màn hình</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Hiển thị biểu mẫu thông minh</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Sau thời gian xem trang nhất định</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Khi cuộn trang xuống</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Khi thoát trang</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hiển thị trên nhiều trang liên quan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Theo chiến dịch</td>
                                        <td></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Quản lý thông tin khách hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý thông tin liên hệ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Nuôi dưỡng khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý cơ hội bán hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý khách hàng tiềm năng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý phân khúc khách hàng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý theo khu vực địa lý</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Nhập/xuất dữ liệu</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Quản lý quy trình bán hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quy trình định vị khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Đa quy trình bán hàng</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mobile-table-toogle-content"> <span class="toogle-text-show">Chi tiết gói<i class="fa fa-angle-down"></i></span><span class="toogle-text-hide">Thu gọn gói<i class="fa fa-angle-up"></i></span></div>
                </div>
                <div class="table-mobile-item">
                    <div class="table-mobile-wrapper">
                        <div class="mobile-table-header">
                            <div class="mobile-table-header__body">
                                <h3 class="table-header__name">Basic</h3>
                                <div class="table-header__price"><span class="price">490,000</span><span class="amout">đ</span><span class="unit">/ th</span></div>
                                <p class="table-header__text">Tiết kiệm 10% với gói 1 năm chỉ <abbr> 2.050.000đ</abbr></p>
                                <a class="md-btn table-header__btn md-btn--primary md-btn--md " href="#">Mua gói
                                </a>
                                <p class="table-header__info">Miễn phí dùng thử 30 ngày</p>
                            </div>
                        </div>
                        <div class="mobile-table-content">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Coupon</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Request Demo</td>
                                        <td> </td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Thu thập thông tin khách hàng</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Thiết lập mẫu thông tin</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Biểu mẫu có quy trình</td>
                                        <td> <i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Biểu mẫu có điều kiện</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý chiến dịch</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Thử nghiệm phiên bản A/B</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Thử nghiệm phân tích</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Định vị mục tiêu theo ....</td>
                                        <td></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Thống kê &amp; Phân tích</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Theo dõi tương tác</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Phân tích cơ hội bán hàng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Phân tích dữ liệu</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Kiểu hiển thị biểu mẫu</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>Popup sáng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Cố định khi cuộn trang</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hiển thị bên cột phụ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Thanh trượt ở góc màn hình</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Popup tương thích thiết bị D Đ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Popup toàn màn hình</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Hiển thị biểu mẫu thông minh</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Sau thời gian xem trang nhất định</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Khi cuộn trang xuống</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Khi thoát trang</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hiển thị trên nhiều trang liên quan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Theo chiến dịch</td>
                                        <td></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Quản lý thông tin khách hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý thông tin liên hệ</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Nuôi dưỡng khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý cơ hội bán hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý khách hàng tiềm năng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý phân khúc khách hàng</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý theo khu vực địa lý</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Nhập/xuất dữ liệu</td>
                                        <td><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr class="tr-title">
                                        <td>Quản lý quy trình bán hàng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Quy trình định vị khách hàng tiềm năng</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Đa quy trình bán hàng</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mobile-table-toogle-content"> <span class="toogle-text-show">Chi tiết gói<i class="fa fa-angle-down"></i></span><span class="toogle-text-hide">Thu gọn gói<i class="fa fa-angle-up"></i></span></div>
                </div>
            </div>
        </div><!-- End / table-pricing -->
        
    </div>
</section>
<!-- End / Section -->
@endsection