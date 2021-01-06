
@extends('layouts.app')
@section('content')
<style>
  
  ul.bankList {
    clear: both;
    height: 202px;
    width: 636px;
  }
  ul.bankList li {
    list-style-position: outside;
    list-style-type: none;
    cursor: pointer;
    float: left;
    margin-right: 0;
    padding: 5px 2px;
    text-align: center;
    width: 90px;
  }
  .list-content li {
    list-style: none outside none;
    margin: 0 0 10px;
  }
  
  .list-content li .boxContent {
    display: none;
    width: 636px;
    border:1px solid #cccccc;
    padding:10px; 
  }
  .list-content li.active .boxContent {
    display: block;
  }
  .list-content li .boxContent ul {
    height:280px;
  }
  
  i.VISA, i.MASTE, i.AMREX, i.JCB, i.VCB, i.TCB, i.MB, i.VIB, i.ICB, i.EXB, i.ACB, i.HDB, i.MSB, i.NVB, i.DAB, i.SHB, i.OJB, i.SEA, i.TPB, i.PGB, i.BIDV, i.AGB, i.SCB, i.VPB, i.VAB, i.GPB, i.SGB,i.NAB,i.BAB 
  { width:90px; height:30px; display:block; background:url(https://www.nganluong.vn/webskins/skins/nganluong/checkout/version3/images/bank_logo.png) no-repeat;}
  i.MASTE { background-position:0px -31px}
  i.AMREX { background-position:0px -62px}
  i.JCB { background-position:0px -93px;}
  i.VCB { background-position:0px -124px;}
  i.TCB { background-position:0px -155px;}
  i.MB { background-position:0px -186px;}
  i.VIB { background-position:0px -217px;}
  i.ICB { background-position:0px -248px;}
  i.EXB { background-position:0px -279px;}
  i.ACB { background-position:0px -310px;}
  i.HDB { background-position:0px -341px;}
  i.MSB { background-position:0px -372px;}
  i.NVB { background-position:0px -403px;}
  i.DAB { background-position:0px -434px;}
  i.SHB { background-position:0px -465px;}
  i.OJB { background-position:0px -496px;}
  i.SEA { background-position:0px -527px;}
  i.TPB { background-position:0px -558px;}
  i.PGB { background-position:0px -589px;}
  i.BIDV { background-position:0px -620px;}
  i.AGB { background-position:0px -651px;}
  i.SCB { background-position:0px -682px;}
  i.VPB { background-position:0px -713px;}
  i.VAB { background-position:0px -744px;}
  i.GPB { background-position:0px -775px;}
  i.SGB { background-position:0px -806px;}
  i.NAB { background-position:0px -837px;}
  i.BAB { background-position:0px -868px;}
  
  ul.cardList li {
    cursor: pointer;
    float: left;
    margin-right: 3px;
    margin-left: 14px;
    padding: 5px 4px;
    text-align: center;
    width: 100px;
  }
  .bank-online-methods {
  	height: 60px;
  	list-style: none;
  	margin:  10px;
  	border-radius: 3px;
  	border: solid 1px #d8d8d8;
  	z-index: 1;
  	position: relative;
  }
  .bank-online-methods:hover{
  	border: solid 1px #ff4669;
  }
  .icon_cc:before{
  	z-index: 2;
  	content:url('../iconSVG/shape_v.svg');
  	position: absolute;
  	top: 3px;
  	left: 3px;
  }
  .bank-online-methods label>i{
  	position: absolute;
  	top: 15px;
  	left: 5px;
  	padding: 10px;
  }
  .btn_apply_coupon{
  	font-family: Muli;
	font-size: 12px;
	font-weight: 600;
	font-style: normal;
	font-stretch: normal;
	letter-spacing: normal;
	text-align: left;
	color: #ffffff;
	background-color: #ff4669;
	border-radius: 20px;
	border: 1px solid #ff4669;
  }
  .btn_apply_coupon:hover{
	background-color: #e61e44;
  }
  #code_coupon:disabled{
  	background-color: #eee0;
  }
  ul{
  	padding: 0px;
  }
</style>
 
<meta name="csrf-token" content="{!! Session::token() !!}">
<div class="container setting">
	<div class="row setting_title">
		<h2>Setting</h2>
		<span>Select one style available or create new style</span>
	</div>

	<div class="row setting_content">
		<div class="col-md-2 setting_menu">
			<ul>
				<li>
					<svg  width="18" height="18" viewBox="0 0 18 18">
						<path fill="#B2B2B2" fill-rule="nonzero" d="M9 0a9 9 0 1 0 0 18A9 9 0 0 0 9 0zM4.935 7.258a4.065 4.065 0 1 1 8.13 0 4.065 4.065 0 0 1-8.13 0zm9.741 6.266c-2.916 3.644-8.433 3.648-11.352 0a3.473 3.473 0 0 1 2.482-1.04h.661a5.81 5.81 0 0 0 5.066 0h.66c.972 0 1.851.398 2.483 1.04z"></path>
					</svg>
					<a href="{{ URL::action('HomeController@info') }}">Profile</a>
				</li>
				<li>
					<svg  width="16" height="18" viewBox="0 0 16 18">
						<path fill="#B2B2B2" fill-rule="nonzero" d="M1.684 7.714v6h2.527v-6H1.684zm5.053 0v6h2.526v-6H6.737zM0 18h16v-2.571H0V18zM11.79 7.714v6h2.526v-6h-2.527zM8 0L0 4.286V6h16V4.286L8 0z"></path>
					</svg>
					@can('cpn_info')<a href="{{ URL::action('CompanyController@view') }}">Company info</a>@endcan
				</li>

				<li>
					<svg  width="18" height="18" viewBox="0 0 18 18">
						<path fill="#B2B2B2" fill-rule="nonzero" d="M13.5 16.2a.901.901 0 0 1-.9-.9c0-1.189 1.8-1.19 1.8 0 0 .496-.404.9-.9.9zm-10.8 0a.901.901 0 0 1-.9-.9c0-.496.404-.9.9-.9s.9.404.9.9-.404.9-.9.9zm.9-12.6a1.8 1.8 0 0 0-1.8 1.8v7.366a2.692 2.692 0 0 0 .393 5.188A2.703 2.703 0 0 0 5.4 15.3a2.691 2.691 0 0 0-1.8-2.534V12.6h9v.166a2.692 2.692 0 0 0 .393 5.188A2.703 2.703 0 0 0 16.2 15.3a2.691 2.691 0 0 0-1.8-2.534V2.7a.9.9 0 0 1 .9-.9h1.8a.9.9 0 0 0 0-1.8h-2.7a1.8 1.8 0 0 0-1.8 1.8v1.8h-9z"></path>
					</svg>
					@can('Cart')<a href="{{ URL::action('CartController@item') }}">Subscripion</a>@endcan
				</li>
				<li>
					<svg  width="18" height="18" viewBox="0 0 18 18">
						<path fill="#B2B2B2" fill-rule="nonzero" d="M18 6.188a6.187 6.187 0 0 1-7.342 6.08l-.844.949a.844.844 0 0 1-.63.283H7.875v1.406a.844.844 0 0 1-.844.844H5.625v1.406a.844.844 0 0 1-.844.844H.844A.844.844 0 0 1 0 17.156v-2.744c0-.224.089-.438.247-.597l5.688-5.688A6.187 6.187 0 0 1 11.812 0 6.175 6.175 0 0 1 18 6.188zM11.812 4.5a1.687 1.687 0 1 0 3.375 0 1.687 1.687 0 0 0-3.374 0z"></path>
					</svg>
					<a href="{{ URL::action('HomeController@change') }}">Password</a>
				</li>
			</ul>
		</div>
	<form  name="NLpayBank" action="{{ URL::action('CartController@payment') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-6" >
			<div class="col-md-12 cart_content">
				<div class="cart_title">THÔNG TIN KHÁCH HÀNG</div>
					<div class="cart_main">
						<div class="form-group row">
						<label for="name" class="col-md-3 control-label">Họ tên</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="buyer_fullname"  value="{{ $buyer->name }}" required="">
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="buyer_email"  value="{{ $buyer->email }}" required="">
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-3 control-label">Số điện thoại</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="buy_phone" name="buyer_mobile" value="{{ $buyer->phone }}" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-md-3 control-label"></label>
						<div class="col-md-9" id="phone_erro"  style="color: red;">
							
						</div>
					</div>
					
					</div>
			</div>
			<div class="col-md-12 cart_space"></div>
			<div class="col-md-12 cart_content">
				<div class="cart_title">THÔNG TIN GÓI</div>
					<div class="cart_main">
					<!-- <div class="form-group row">
						<label for="name" class="col-md-3 control-label">Tên gói</label>
						<div class="col-md-9">
							<input type="hidden" >
							<span>{{ $package->name }}</span>
						</div>
					</div> -->
					<div class="cart_space"></div>
					<div class="form-group row">
						<label for="name" class="col-md-3 control-label">Thời hạn</label>
						<div class="col-md-9">
							<select class="form-control" id="time_order" name="id_variable" required="">
								<option disabled="" selected="">Chọn thời hạn</option>
                                @foreach ($package->variable as $variable)
                                    <option value="{{$variable->id_variable}}">{{$variable->name}} tháng</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="" id="package_price">
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-md-3 control-label"></label>
						<div class="col-md-9" id="package_erro"  style="color: red;">
							
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-3 control-label">Coupon</label>
						<div class="col-md-7">
							<input type="text" class="form-control" id="code_coupon" name="coupon" placeholder="Nhập mã coupon nếu có">
						</div>
						<div class="col-md-2"><input type="button" value="Apply" data="{{ URL::action('CouponController@checkCoupon') }}" class="btn_apply_coupon"></div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-md-3 control-label"></label>
						<div class="col-md-9" id="apply_status">
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="name" class="col-md-3 control-label">Giá tiền</label>
						<div class="col-md-9">
							<span id="amount_payment">0</span> &nbsp&nbsp&nbsp&nbspđ
							<input type="hidden" name="" id="package_price">
						</div>
					</div> -->
					
					</div>
			</div>
			<div class="col-md-12 cart_space"></div>
			<div class="col-md-12 cart_content">
				<div class="cart_title">PHƯƠNG THỨC THANH TOÁN</div>
				<div class="cart_main">
					<div class="form-group row">
						<label for="name" class="col-md-3 control-label"></label>
						<div class="col-md-9" id="pay_erro" style="color: red;">
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-md-3 control-label">Phương thức</label>
						<div class="col-md-9">
							<select class="form-control" id="option_payment" name="option_payment">
							  <option selected="" disabled="">Chọn phương thức thanh toán</option>
		                      <option value="ATM_ONLINE" >Thanh toán online bằng thẻ ngân hàng nội địa</option>
		                      <option value="IB_ONLINE" >Thanh toán bằng IB</option>
		                      <option value="ATM_OFFLINE">Thanh toán atm offline</option>
		                      <option value="NH_OFFLINE" >Thanh toán tại văn phòng ngân hàng</option>
		                      <option value="VISA" >Thanh toán bằng thẻ Visa hoặc MasterCard</option>
		                      <option value="NL" >Thanh toán bằng Ví điện tử NgânLượng</option>
		                      <!-- <option value="CREDIT_CARD_PREPAID" >Thanh toán bằng thẻ Visa hoặc MasterCard trả trước</option> -->
		                    </select>
						</div>
					</div>
					<div>
						<div id="NL">
					        <p>
					        Thanh toán trực tuyến AN TOÀN và ĐƯỢC BẢO VỆ, sử dụng thẻ ngân hàng trong và ngoài nước hoặc nhiều hình thức tiện lợi khác.
					        Được bảo hộ & cấp phép bởi NGÂN HÀNG NHÀ NƯỚC</p>
					    </div>
					    <div id="ATM_ONLINE">
					        <p class="col-md-12"><i>
					        <span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>
					              
					            <ul class="cardList clearfix">
					            <li class="bank-online-methods ">
					              <label for="bidv_ck_on">
					                <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
					                <input type="radio" value="BIDV"  name="bankcode">
					            </label></li>
					            <li class="bank-online-methods ">
					              <label for="vcb_ck_on">
					                <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
					                <input type="radio" value="VCB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="vnbc_ck_on">
					                <i class="DAB" title="Ngân hàng Đông Á"></i>
					                <input type="radio" value="DAB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="tcb_ck_on">
					                <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
					                <input type="radio" value="TCB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_mb_ck_on">
					                <i class="MB" title="Ngân hàng Quân Đội"></i>
					                <input type="radio" value="MB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_vib_ck_on">
					                <i class="VIB" title="Ngân hàng Quốc tế"></i>
					                <input type="radio" value="VIB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_vtb_ck_on">
					                <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
					                <input type="radio" value="ICB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_exb_ck_on">
					                <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
					                <input type="radio" value="EXB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_acb_ck_on">
					                <i class="ACB" title="Ngân hàng Á Châu"></i>
					                <input type="radio" value="ACB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_hdb_ck_on">
					                <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
					                <input type="radio" value="HDB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_msb_ck_on">
					                <i class="MSB" title="Ngân hàng Hàng Hải"></i>
					                <input type="radio" value="MSB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_nvb_ck_on">
					                <i class="NVB" title="Ngân hàng Nam Việt"></i>
					                <input type="radio" value="NVB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_vab_ck_on">
					                <i class="VAB" title="Ngân hàng Việt Á"></i>
					                <input type="radio" value="VAB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_vpb_ck_on">
					                <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
					                <input type="radio" value="VPB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="sml_atm_scb_ck_on">
					                <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
					                <input type="radio" value="SCB"  name="bankcode" >
					              
					            </label></li>

					            

					            <li class="bank-online-methods ">
					              <label for="bnt_atm_pgb_ck_on">
					                <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
					                <input type="radio" value="PGB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="bnt_atm_gpb_ck_on">
					                <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
					                <input type="radio" value="GPB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="bnt_atm_agb_ck_on">
					                <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
					                <input type="radio" value="AGB"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="bnt_atm_sgb_ck_on">
					                <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
					                <input type="radio" value="SGB"  name="bankcode" >
					              
					            </label></li> 
					            <li class="bank-online-methods ">
					              <label for="sml_atm_bab_ck_on">
					                <i class="BAB" title="Ngân hàng Bắc Á"></i>
					                <input type="radio" value="BAB"  name="bankcode" >
					              
					            </label></li>
					            <li class="bank-online-methods ">
					              <label for="sml_atm_bab_ck_on">
					                <i class="TPB" title="Tền phong bank"></i>
					                <input type="radio" value="TPB"  name="bankcode" >
					              
					            </label></li>
					            <li class="bank-online-methods ">
					              <label for="sml_atm_bab_ck_on">
					                <i class="NAB" title="Ngân hàng Nam Á"></i>
					                <input type="radio" value="NAB"  name="bankcode" >
					              
					            </label></li>
					            <li class="bank-online-methods ">
					              <label for="sml_atm_bab_ck_on">
					                <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
					                <input type="radio" value="SHB"  name="bankcode" >
					              
					            </label></li>
					            <li class="bank-online-methods ">
					              <label for="sml_atm_bab_ck_on">
					                <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
					                <input type="radio" value="OJB"  name="bankcode" >
					              
					            </label></li>
					          </ul>
					        


					        </div>
					    <div id="IB_ONLINE">
					        <p class="col-md-12"><i>
					            <span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>

					        <ul class="cardList clearfix">
					          <li class="bank-online-methods ">
					            <label for="bidv_ck_on">
					              <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
					              <input type="radio" value="BIDV"  name="bankcode" >

					            </label></li>
					          <li class="bank-online-methods ">
					            <label for="vcb_ck_on">
					              <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
					              <input type="radio" value="VCB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="vnbc_ck_on">
					              <i class="DAB" title="Ngân hàng Đông Á"></i>
					              <input type="radio" value="DAB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="tcb_ck_on">
					              <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
					              <input type="radio" value="TCB"  name="bankcode" >

					            </label></li>
					        </ul>
				        </div>
						<div id="ATM_OFFLINE">
						        <ul class="cardList clearfix">
						          <li class="bank-online-methods ">
						            <label for="bidv_ck_on">
						              <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
						              <input type="radio" value="BIDV"  name="bankcode" >

						            </label></li>
						            
						          <li class="bank-online-methods ">
						            <label for="vcb_ck_on">
						              <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
						              <input type="radio" value="VCB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="vnbc_ck_on">
						              <i class="DAB" title="Ngân hàng Đông Á"></i>
						              <input type="radio" value="DAB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="tcb_ck_on">
						              <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
						              <input type="radio" value="TCB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="sml_atm_mb_ck_on">
						              <i class="MB" title="Ngân hàng Quân Đội"></i>
						              <input type="radio" value="MB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="sml_atm_vtb_ck_on">
						              <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
						              <input type="radio" value="ICB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="sml_atm_acb_ck_on">
						              <i class="ACB" title="Ngân hàng Á Châu"></i>
						              <input type="radio" value="ACB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="sml_atm_msb_ck_on">
						              <i class="MSB" title="Ngân hàng Hàng Hải"></i>
						              <input type="radio" value="MSB"  name="bankcode" >

						            </label></li>

						          <li class="bank-online-methods ">
						            <label for="sml_atm_scb_ck_on">
						              <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
						              <input type="radio" value="SCB"  name="bankcode" >

						            </label></li>
						          <li class="bank-online-methods ">
						            <label for="bnt_atm_pgb_ck_on">
						              <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
						              <input type="radio" value="PGB"  name="bankcode" >

						            </label></li>
						          
						           <li class="bank-online-methods ">
						            <label for="bnt_atm_agb_ck_on">
						              <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
						              <input type="radio" value="AGB"  name="bankcode" >

						            </label></li>
						          <li class="bank-online-methods ">
						            <label for="sml_atm_bab_ck_on">
						              <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
						              <input type="radio" value="SHB"  name="bankcode" >
						            </label></li>
						        </ul>
						      </div>

						<div id="NH_OFFLINE">
					        <ul class="cardList clearfix">
					          <li class="bank-online-methods ">
					            <label for="bidv_ck_on">
					              <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
					              <input type="radio" value="BIDV"  name="bankcode" >

					            </label></li>
					          <li class="bank-online-methods ">
					            <label for="vcb_ck_on">
					              <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
					              <input type="radio" value="VCB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="vnbc_ck_on">
					              <i class="DAB" title="Ngân hàng Đông Á"></i>
					              <input type="radio" value="DAB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="tcb_ck_on">
					              <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
					              <input type="radio" value="TCB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="sml_atm_mb_ck_on">
					              <i class="MB" title="Ngân hàng Quân Đội"></i>
					              <input type="radio" value="MB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="sml_atm_vib_ck_on">
					              <i class="VIB" title="Ngân hàng Quốc tế"></i>
					              <input type="radio" value="VIB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="sml_atm_vtb_ck_on">
					              <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
					              <input type="radio" value="ICB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="sml_atm_acb_ck_on">
					              <i class="ACB" title="Ngân hàng Á Châu"></i>
					              <input type="radio" value="ACB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="sml_atm_msb_ck_on">
					              <i class="MSB" title="Ngân hàng Hàng Hải"></i>
					              <input type="radio" value="MSB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="sml_atm_scb_ck_on">
					              <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
					              <input type="radio" value="SCB"  name="bankcode" >

					            </label></li>



					          <li class="bank-online-methods ">
					            <label for="bnt_atm_pgb_ck_on">
					              <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
					              <input type="radio" value="PGB"  name="bankcode" >

					            </label></li>

					          <li class="bank-online-methods ">
					            <label for="bnt_atm_agb_ck_on">
					              <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
					              <input type="radio" value="AGB"  name="bankcode" >

					            </label></li>
					          <li class="bank-online-methods ">
					            <label for="sml_atm_bab_ck_on">
					              <i class="TPB" title="Tền phong bank"></i>
					              <input type="radio" value="TPB"  name="bankcode" >
					            </label></li>
					        </ul>
					    </div>

					    <div id="VISA">
					        <p class="col-md-12"><span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>:Visa hoặc MasterCard.</p>
					        <ul class="cardList clearfix">
					            <li class="bank-online-methods ">
					              <label for="vcb_ck_on">
					                Visa:
					                <input type="radio" value="VISA"  name="bankcode" >
					              
					            </label></li>

					            <li class="bank-online-methods ">
					              <label for="vnbc_ck_on">
					                Master:<input type="radio" value="MASTER"  name="bankcode" >
					            </label></li>
					        </ul> 
					    </div>
					</div>
				</div>
				<input type="hidden" name="package_id" value="{{ $package->id_package }}">
				<input type="hidden" name="url_item" value="{{ URL::action('CartController@item') }}">
				<div class="buton_payment">
                    <input type="button" class="btn btn-primary" id="btn_check_null" value="PAYMENT">
                    <input type="submit" class="btn btn-primary" id="btn_pay_submit" >
                </div>
			</div>
			<div class="col-md-12" style="height: 100px"></div>

		</div>
	</form>
		<div class="col-md-4 subscription_content">
			<div class="col-md-12 package_info">
				<div class="info_content">
					<div>{{ $package->name }}</div>
					<div><h1><span id="amount_payment">{{ $package->origin_price }}</span> đ<span style="font-size: 15px;font-weight: 600;"><span id="thoi_han"></span> / tháng</span></h1></div>
					<div>
						<span style="font-size: 13px;font-weight: 600;color: #888888;">Tiết kiệm 25% với gói 1 năm <br>chỉ <span style="color: red;">4.410.000</span>đ</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<input type="hidden" name="" id="url_check_vari" value="{{ URL::action('PackageController@check_variable') }}">
<input type="hidden" name="" id="id_package" value="{{ $package->id_package }}">
@endsection
@section('extra_footer')
<script src="{{asset('/js/getaco.js')}}"></script>
<script src="{{ asset('/js/coupon/check.js') }}"></script>
<script src="{{ asset('/js/coupon/cart.js') }}"></script>
@endsection
