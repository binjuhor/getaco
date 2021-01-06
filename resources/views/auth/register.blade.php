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
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formRegister">
                {{ csrf_field() }}
                <div class="tab-content">
                    <div id="step1" class="tab-pane fade in active">
                        <div class="text-center"><span class="title_register">Đăng ký tài khoản</span></div>
                        <div id="input_register" class="form-group{{ $errors->has('name') ? ' has-error' : '' }} input_register">
                            <!-- name -->
                            <div id="note_register" class="text-center" style="color: #F40909;"> @if ($errors->has('email'))
                                    <b>Email không hợp lệ !</b>
                                @endif</div>
                            <div class="form-group">
                                <input id="name" type="text" style="width: 100%;" placeholder="Tên của bạn" class="form-control" name="name" value="{{ isset($name)?$name:old('name') }}" required autofocus>
                                

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <!-- email -->
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" placeholder="Email đăng ký" name="email" value="{{ isset($email)?$email:old('email') }}" required>

                               
                            </div>

                            <!-- password -->
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Mật khẩu" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password1" type="password" placeholder="Xác nhận mật khẩu" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <p class="text-center text_register">Bằng việc bấm đăng ký, tôi đồng ý với điều khoản dịch vụ và chính sách về quên riêng tư</p>
                                <input type="button" class="btn btn-primary" style="text-align: center;" id="btn_next" value="TIẾP TỤC">
                            </div>
                        </div>
                        
                        <!-- <a data-toggle="pill" class="btn btn-primary" href="#step2">NEXT</a> -->
                    </div>
                    <div id="step2" class="tab-pane fade">
                        <div class="text-center"><span class="title_register">Thiết lập cho doanh nghiệp</span></div>
                        <div id="input_register" class="form-group{{ $errors->has('name') ? ' has-error' : '' }} input_register">
                            <div id="note_register1" class="text-center" style="color: #F40909;"></div>
                            <div class="form-group">
                                <input  type="text" class="form-control" placeholder="Tên doanh nghiệp của bạn" id="company_name" name="company_name">
                            </div>
                            <!-- business type -->
                            <div class="form-group">
                                <?php 
                                    use App\Orbit;
                                    $orbits = Orbit::all();
                                 ?>
                                <select name="business_type" id="business_type" class="form-control">
                                    <option value="null" selected disabled>Lĩnh vực hoạt động</option>
                                    @foreach($orbits as $orbit)
                                    <option value="{{$orbit->id_orbit}}">{{$orbit->orbit}}</option>
                                    @endforeach
                                    <option value="-1">Lĩnh vực khác</option>
                                </select>
                            </div>
                            <!-- website -->
                            <div class="form-group">
                                <input  type="text" class="form-control" placeholder="Website của bạn" id="website" name="website" >
                            </div>
                            <!-- address -->
                            <div class="form-group">
                                <input  type="text" class="form-control" placeholder="Địa chỉ doanh nghiệp" id="address" name="address">
                            </div>
                            
                            <div class="form-group">
                                <p class="text-center text_register">Bằng việc bấm đăng ký, tôi đồng ý với điều khoản dịch vụ <br> và chính sách về quên riêng tư</p>
                            <input type="button" id="btn_register" style="text-align: center;" class="btn btn-primary text-center" value="ĐĂNG KÝ">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center login_bottom">
                <p>Bạn đã có tài khoản</p>
                <a href="{{ route('login') }}"><u>ĐĂNG NHẬP</u></a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<input type="hidden" name="" id="url_check_mail" value="{{ URL::to('/register/check_mail') }}">
<input type="hidden" name="" id="check_email" value="0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $("#btn_next").click(function(){
            var email = document.getElementById('email').value;
             var name = document.getElementById('name').value;
             var password = document.getElementById('password').value;
             var password1 = document.getElementById('password1').value;
            if (name == '') {
                document.getElementById('note_register').innerHTML = '<b>Tên không được trống !</b>';
                $( "#name" ).focus();
                return false;
            }
            if (email == '') {
                document.getElementById('note_register').innerHTML = '<b>Email không được trống !</b>';
                $( "#email" ).focus();
                return false;
            }
            if (password == '') {
                document.getElementById('note_register').innerHTML = '<b>Mật khẩu không được trống</b>';
                $( "#password" ).focus();
                return false;
            }
            if (password1 == '') {
                document.getElementById('note_register').innerHTML = '<b>Xác nhận mật khẩu không được trống !</b>';
                $( "#password1" ).focus();
                return false;
            }
            if (password1 != password) {
                document.getElementById('note_register').innerHTML = '<b>Xác nhận mật khẩu không đúng !</b>';
                $( "#password1" ).focus();
                return false;
            }
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(email)) {
                    document.getElementById('note_register').innerHTML = '<b>Email không hợp lệ !</b>';
                    $( "#email" ).focus();
                    return false;
                }
            if(email != ''){
                var url = $('#url_check_mail').val();
                var token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    url : url,
                    type : "post",
                    dataType:"text",
                    data : {
                         _token : token,
                         email : email
                    },
                    success : function (result){
                        if(result > 0){
                            document.getElementById('note_register').innerHTML = '<b>Email đã được sử dụng !</b>';
                            $( "#email" ).focus();
                        }else{
                            $("#step2").addClass("in active");
                            $("#step1").hide(); 
                        }
                    },
                    error: function (result) {
                       if(result.responseText > 0){
                            document.getElementById('note_register').innerHTML = '<b>Email đã được sử dụng !</b>';
                            $( "#email" ).focus();
                        }else{
                            $("#step2").addClass("in active");
                            $("#step1").hide(); 
                        }
                    }
                });
            }
        });


        $("#btn_register").click(function(){
             var company_name = document.getElementById('company_name').value;
             var company_web = document.getElementById('website').value;
             var company_add = document.getElementById('address').value;
             var business_type = document.getElementById('business_type').value;
            if (company_name == '') {
                document.getElementById('note_register1').innerHTML = '<b>Tên doanh nghiệp không được trống !</b>';
                return false;
            }
            else if (business_type == 'null') {
                document.getElementById('note_register1').innerHTML = '<b>Chưa chọn lĩnh vực hoạt động !</b>';
                return false;
            }
            else if (company_web == '') {
                document.getElementById('note_register1').innerHTML = '<b>Website không được trống !</b>';
                return false;
            }
            else if (company_add == '') {
                document.getElementById('note_register1').innerHTML = '<b>Địa chỉ không được trống !</b>';
                return false;
            }
            
            document.getElementById('formRegister').submit();
        });
    });
</script>
@endsection
