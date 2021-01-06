@extends('layouts.index')

@section('content')

<div class="row login_header">
    <a href="{{ URL::action('PageController@index') }}" class="col-sm-4 text-right"><img src="" alt="">VỀ TRANG CHỦ</a>
    <div class="col-md-3 text-right">Getaco</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <div class="form-horizontal" >
                <div class="tab-content">
                    <div id="step1" class="tab-pane fade in active">
                        <div class="text-center">
                            <img src="" class="img_success" alt="">
                            <span class="title_register register_success">Hoàn tất đăng ký</span>
                        </div>
                        <div id="input_register" class="form-group{{ $errors->has('name') ? ' has-error' : '' }} input_register">
                      
                            <div class="form-group">
                                <!-- Đoạn này không được xóa -->
                                <!-- <p class="text-center text_register">
                                    @if (session('status'))
                                            {{ session('status') }}
                                    @endif</p> -->

                                <p class="text-center text_register">
                                    Bằng việc bấm đăng kí, tôi đồng ý với điều khoản dịch vụ và chính sách về quyền riêng tư</p>
                                    <a type="button" href="{{ route('login') }}" class="btn btn-primary" style="text-align: center;width: 100%">TRUY CẬP NGAY</a>
                            </div>
                        </div>
                        
                        <!-- <a data-toggle="pill" class="btn btn-primary" href="#step2">NEXT</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div> 
</div>
@endsection
