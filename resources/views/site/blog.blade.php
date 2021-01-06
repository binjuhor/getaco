@extends('layouts.page')

@section('site_title')
Trang tin tức
@endsection

@section('header_class')
header header__transparent header-fixed
@endsection

@section('content')
<!-- hero-page -->
<div class="hero-page md-skin-dark" style="background-image:url(https://images.pexels.com/photos/1068523/pexels-photo-1068523.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260);">
    <div class="md-overlay"></div>
    <div class="hero-page__before"><img src="assets/img/hero/hero-page1.png" alt=""/></div>
    <div class="hero-page__after"><img src="assets/img/hero/hero-page2.png" alt=""/></div>
    <div class="hero-page__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ">
                    <h1 class="hero-page__title">Tìm được những khách hàng tiềm năng giúp bạn tiết kiệm chi phí và thời gian </h1>
                </div>
            </div>
        </div>
    </div>
</div><!-- End / hero-page -->


<!-- Section -->
<section class="md-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-3 ">
                
                <!-- title -->
                <div class="title md-text-center">
                    <h2 class="title__title">Tại sao các doanh nghiệp bất động sản nên sử dụng getaco</h2>
                </div><!-- End / title -->
                
            </div>
        </div>
        <div class="list-function">
            <ul class="list-function__list">
                <li><a href="#function"><img src="assets/img/list-tab/5.svg" alt=""><span>thu thập được khách hàng đúng nhu cầu</span></a></li>
                <li><a href="#function2"><img src="assets/img/list-tab/6.svg" alt=""><span>Dẽ dàng quản lý khách hàng từ nhiều kênh</span></a></li>
                <li><a href="#function3"><img src="assets/img/list-tab/7.svg" alt=""><span>Đo được hiệu quả của các kênh</span></a></li>
                <li><a href="#function4"><img src="assets/img/list-tab/8.svg" alt=""><span>Không để mất khách hàng tiềm năng</span></a></li>
            </ul>
        </div>
        
        <!-- grid-list -->
        <div class="grid-list" id="function">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  align-self col-lg-push-7">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list5.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  col-lg-pull-4 align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/5.svg" alt=""/></span>
                        <h3 class="grid-list__title">Tốn ít chí phí mà vẫn thu thập được khách hàng đúng nhu cầu </h3>
                        <p class="grid-list__text">Thay vì tốn tiền mua database khách hàng , mất công chăm sóc những khách hàng không đem lại cho bạn lợi nhuận thì chúng tôi sẽ giúp bạn tìm kiếm được đúng những khách hàng tiềm năng và đúng nhu cầu . Khiến việc mua bán trở nên thuận lợi hơn . </p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- grid-list -->
        <div class="grid-list" id="function2">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list6.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/6.svg" alt=""/></span>
                        <h3 class="grid-list__title">Dễ dàng quản lý khách hàng từ nhiều kênh </h3>
                        <p class="grid-list__text">Khi bạn phát triển quá nhiều kênh để quảng cáo và không thể quản lý số lượng khách hàng . Bị tốn nguồn nhân lực và khách hàng bị rải rác . Chúng tôi sẽ giúp bạn quản lý dễ dàng hơn </p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- cta-03 -->
        <div class="cta-03 bg-gradient md-skin-dark">
            <div class="cta-03__bg" style="background-image: url(assets/img/cta/cta2.png);"></div>
            <div class="md-tb">
                <div class="md-tb__cell md-tb--left">
                    <h2 class="cta-03__title">Tìm kiếm những khách hàng tiềm năng chưa bao giờ dễ đến thế</h2>
                </div>
                <div class="md-tb__cell md-tb--right">
                    <a class="md-btn md-btn--light" href="{{ url('/register') }}">Đăng ký dùng thử
                    </a>
                </div>
            </div>
        </div><!-- End / cta-03 -->
        
        
        <!-- grid-list -->
        <div class="grid-list" id="function3">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  align-self col-lg-push-7">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list7.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5  col-lg-pull-4 align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/7.svg" alt=""/></span>
                        <h3 class="grid-list__title">Đo được hiệu quả của từng kênh </h3>
                        <p class="grid-list__text">Bạn phân vân không biết các kênh của mình hoat động có hiệu quả . Chúng tôi sẽ giúp bạn checking các kênh  để phân bố nguồn lực hợp lý giúp phát triển hệ thống</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        
        <!-- grid-list -->
        <div class="grid-list" id="function4">
            <div class="row display-flex">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__media"><img src="assets/img/list-tab/list8.svg" alt=""/></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1  align-self">
                    <div class="grid-list__body"><span class="grid-list__icon"><img src="assets/img/list-tab/8.svg" alt=""/></span>
                        <h3 class="grid-list__title">Giữ lại được các khách hàng tiềm năng</h3>
                        <p class="grid-list__text">Đội ngũ kinh doanh của bạn làm việc thiếu hiệu quả , Quy trình chưa rõ ràng khiến việc thất thoát những khách hàng tiềm năng là chuyện tất yếu . Chúng tôi có thể hệ thống hoá quy trình chăm sóc khách hàng để giúp bạn bán hàng hiệu quả hơn .</p>
                    </div>
                </div>
            </div>
        </div><!-- End / grid-list -->
        
        <div class="md-text-center md-btn-wrapper">
            <a class="md-btn md-btn--outline-primary" target="_blank" href="https://docs.google.com/document/d/1dhyiEV6FVgK5p4lZTNUcN_kzY-9ZFUE6fw5V7xyyfkQ/edit">tải tài liệu hướng dẫn <i class="fa fa-file-pdf-o"></i>
            </a>
            <a class="md-btn md-btn--primary" href="{{ url('/register') }}">Đăng ký dùng thử
            </a>
        </div>
    </div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ">
                
                <!-- title -->
                <div class="title">
                    <h2 class="title__title">Câu hỏi thường gặp</h2>
                </div><!-- End / title -->
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 ">
                
                <!-- ac-accordion -->
                <div class="ac-accordion" data-options="{}">
                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Tôi cần gì để sử dụng Getaco?</a></div>
                        <div class="ac-accordion__body">
                            <p>Getaco có thể được cài đặt trên hầu hết các nền tảng trang web trên internet và chúng tôi tích hợp với mọi dịch vụ tiếp thị qua email. Yêu cầu duy nhất là bạn phải có một trang web nơi bạn có thể thêm JavaScript tùy chỉnh trong phần nội dung trang của trang web của bạn</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->
                    
                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Làm thế nào để tôi có thể trải nghiệm miễn phí ?</a></div>
                        <div class="ac-accordion__body">
                            <p>Hiện tại bạn chỉ cần đăng ký là bạn có thể dùng thử miễn phí tính năng của getaco.</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->
                    
                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Tôi có thể nhận được hướng dẫn cụ thể?</a></div>
                        <div class="ac-accordion__body">
                            <p>Chắc chắn rồi, hiện tại Getaco cung cấp cho người dùng một document cực kỳ rõ ràng và dễ hiểu để sử dụng tính năng của getaco phục vụ cho mục đích của mình.</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->
                    
                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Phần mềm có bao gồm kế hoạch thực thi?</a></div>
                        <div class="ac-accordion__body">
                            <p>Phần mềm sẽ hỗ trợ bạn tốt nhất trong phần quản lý khách hàng tiềm năng. Đánh dấu, trạng thái, cập nhật thông tin từng khách hàng tiềm năng.</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->
                    
                </div><!-- End / ac-accordion -->
                
            </div>
            <div class="col-md-6 col-lg-6 ">
                
                <!-- ac-accordion -->
                <div class="ac-accordion" data-options="{}">
                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Tôi có cần kiến thức công nghệ thông tin để sử dụng không?</a></div>
                        <div class="ac-accordion__body">
                            <p>Bạn không nhất thiết phải là một nhân viên IT hoặc một ai đó am hiểu công nghệ thông tin mới có thể sử dụng, bạn có thể là nhân viên kinh doanh hoặc bà mẹ bỉm sữa cũng có thể sử dụng getaco để phục vụ cho công việc của mình.</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->    

                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Nếu sử dụng Getaco, tôi có cần đội marketing không?</a></div>
                        <div class="ac-accordion__body">
                            <p>Không nhất thiết phải là một công ty, doanh nghiệp hay một đội Marketing, bạn có thể là cá nhân hoặc một ai đó có nhu cầu sử dụng getaco để phục vụ công việc đều có thể sử dụng.</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->
                    
                    
                    <!-- ac-accordion__panel -->
                    <div class="ac-accordion__panel">
                        <div class="ac-accordion__header"><a class="ac-accordion__title" href="#" data-number="1">Getaco có đội ngũ support staff hướng dẫn sử dụng và liên lạc trực tiếp nếu gặp khó khăn không? </a></div>
                        <div class="ac-accordion__body">
                            <p>Getaco có một đội ngũ chuyên nghiệp túc trực 24/7 hỗ trợ cả về công nghệ lẫn cách sử dụng getaco cho công việc của bạn, bạn hoàn toàn yên tâm về việc sử dụng cũng như trải nghiệm getaco.</p>
                        </div>
                    </div><!-- End / ac-accordion__panel -->
                    
                </div><!-- End / ac-accordion -->
                
            </div>
        </div>
    </div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
    <div class="container">
        
        <!-- cta-04 -->
        <div class="cta-04 bg-gradient md-skin-dark">
            <div class="cta-04__svg"><img src="assets/img/cta/cta3.png" alt=""/></div>
            <div class="cta-04__item">
                <h3 class="cta-04__title">Hãy liên hệ với chúng tôi để giải đáp thắc mắc</h3><a class="cta-04__phone" href="#">086.929.1771</a>
            </div>
            <div class="cta-04__item">
                <h3 class="cta-04__title">Để lại email để chúng tôi có thể giải đáp những vấn đề của bạn</h3>
                
                <!-- form-sub -->
                <form class="form-sub getacoForm __getacoFormInline" id="__getAco_251" action="{{
                    URL::action('CustomerController@saveEmbedData') 
                }}" method="POST">
                    <input type="hidden" name="id_company" value="1">
                    <input type="hidden" name="id_form" value="251">
                    <input type="hidden" name="form_show" value="0">
                    <input type="hidden" name="from_url" value="">
                    <input class="form-sub__input" type="email" required name="customer_email" placeholder="Nhận thông tin qua Gmail"/>
                    <button  type="submit" class="form-sub__submit" style="height:50px;"><i class="fa fa-arrow-right"></i></button>
                    <div class="row field_frontend"></div>
                </form><!-- End / form-sub -->
                
            </div>
        </div><!-- End / cta-04 -->
        
    </div>
</section>
<!-- End / Section -->


<!-- Section -->
<section class="md-section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ">
                
                <!-- title -->
                <div class="title">
                    <h2 class="title__title">Một số lĩnh vực khác </h2>
                </div><!-- End / title -->
                
            </div>
        </div>
        <div class="row row-eq-height">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">
                
                <!-- service-01 -->
                <div class="service-01"><a class="service-01__body">
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
                <div class="service-01"><a class="service-01__body">
                        <div class="md-tb">
                            <div class="md-tb__cell"><span class="service-01__icon"><img src="assets/img/service/2.svg" alt=""/></span>
                                <h3 class="service-01__title">o tô xe máy</h3>
                                {{-- <div class="service-01__btnwrapper"><span class="service-01__btn">Xem chi tiết</span></div> --}}
                            </div>
                        </div></a>
                </div><!-- End / service-01 -->
                
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  col-xsx-12">
                
                <!-- service-01 -->
                <div class="service-01"><a class="service-01__body">
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
                <div class="service-01"><a class="service-01__body">
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
                <div class="service-01"><a class="service-01__body">
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
                <div class="service-01"><a class="service-01__body">
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
                <div class="service-01"><a class="service-01__body">
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
                <div class="service-01"><a class="service-01__body">
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
<script src="https://getaco.com/form-embed/js?id=251"></script>
@endsection