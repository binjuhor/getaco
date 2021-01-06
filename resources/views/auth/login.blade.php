@extends('layouts.index')


@section('content') 
<div class="row login_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 back_home">
                <a href="{{ URL::action('PageController@index') }}" class="col-sm-6"><img src="" alt="">VỀ TRANG CHỦ</a>
            </div>
            <div class="col-sm-6 logo">Getaco</div>
        </div>
    </div>
</div>
<div class="container" style="padding-bottom: 100px;">
    <div class="row">
        <div class="col-md-6" id="login_left">
                    <span class="col-md-12 text-center">Đăng nhập</span>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="col-md-2"></div>
                        <div class="col-md-8 form_login">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                                
                               
                                    <input id="email" class="form-control" placeholder="Email hoặc số điện thoại" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                    <input id="password" type="password" placeholder="Mật khẩu" class="form-control" name="password" required>

                                    <div class="text-center" style="color: #F40909;"><b>
                                    @if ($errors->has('email'))
                                        Email hoặc mật khẩu không đúng !
                                    @endif
                                    @if ($errors->has('password'))
                                        Email hoặc mật khẩu không đúng !
                                    @endif

                                    @if (session('warning'))
                                        {{ session('warning') }}
                                    @endif
                                    @if (session('status'))
                                        <div style="color: #03FB2C;">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </b></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 text-left">
                                    <input id="rememberme" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="rememberme">Ghi nhớ</label>
                                </div>
                                
                                <div class="col-md-6 text-right forgot_password" >
                                    <a class="forgot" href="{{ route('password.request') }}">
                                    QUÊN MẬT KHẨU
                                    </a>
                                </div>
                            </div>

                             <div class="form-group">
                                <button type="submit" class="btn btn-primary login">
                                    ĐĂNG NHẬP
                                </button>
                            </div>
                            <div class="text-center login_bottom">
                                <p>Bạn chưa có tài khoản?</p>
                                <a href="{{ route('register') }}"><u>ĐĂNG KÝ NGAY</u></a>
                            </div>
                        </div>
                       
                        <!-- <div class="form-group">
 
                            <label for="name" class="col-md-4 control-label">Login With</label>
 
                            <div class="col-md-6">
                                <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                            </div>
 
                       </div> -->
                    </form>
        </div>
        <div class="col-md-6 login_image">
            <img src="{{ asset('images/login1x.png') }}" alt="">
        </div>
    </div>
</div>
@endsection
