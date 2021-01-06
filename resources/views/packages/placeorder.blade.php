@extends('layouts.index')

@section('content')
<meta name="csrf-token" content="{!! Session::token() !!}">
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">Place order</div>
        <div class="panel-body">
            {{--  <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab"  href="#basic-info">Gói đã chọn</a></li>
                <li><a data-toggle="tab" href="#information">Thông tin</a></li>
                <li><a data-toggle="tab" href="#payment">Thanh toán</a></li>
            </ul>  --}}
            <div class="clearfix" style="margin-bottom:30px;"></div>
            
            <form action="{{ action('PackageController@order') }}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{$id}}">
                <div class="row">
                    
                    <div id="basic-info" class="tab-pane fade in active col-md-12">

                        <div class="form-group row"><label class="col-md-2 control-label text-right"></label>
                            @if(session('err')) <h4 class="col-md-7" style="color: red">{{ session('err') }}</h4> @endif
                        </div>

                        <div class="form-group row"><label class="col-md-2 control-label text-right">You chooes:</label>
                            <div class="col-md-7"> {{$package->name}}</div>
                        </div>


                        <div class="form-group row"><label class="col-md-2 control-label text-right">Price:</label>
                            <div class="col-md-7" id="origon_price" name = "{{$package->origin_price}}" > ${{$package->origin_price}}</div>
                            <input type="text" name="origon_price" hidden="" id="" value="{{$package->origin_price}}">
                        </div>


                        <div class="form-group row"><label class="col-md-2 control-label text-right">Limited:</label>
                            <div class="col-md-7">
                                <select name="time_order" required="" class="form-control" id="time_order">
                                    @foreach ($package->variable as $variable)
                                        <option value="{{$variable->id_variable}}">{{$variable->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row form-inline">
                            <label class="col-md-2 control-label text-right">Coupon:</label>
                            <div class="col-md-7">
                                <input type="text" id="coupon" name="coupon" class="col-md-7 form-control" placeholder="Enter your coupon" @if($status ==1) required="required" @endif>&nbsp&nbsp
                                <a href="javascript:void(0)" class="btn btn-success" id="btn_apply_coupon" name="{{ URL::action('CouponController@checkCoupon') }}" >Apply</a><br>
                                <b style="" id="result">@if(session('tb')) <i style="color: red">{{ session('tb') }}</i> @endif</b>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 control-label text-right">Total money:</label>
                            <div class="col-md-7"> $ 
                                <span id="amount_payment">{{$package->origin_price}}</span>
                                <input type="text" name="total_pay" id="total_pay" hidden="" value="{{$package->origin_price}}">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-2 control-label text-right"></label>
                            <div class="col-md-7">
                                <a class="btn btn-primary btn-next-information" data-toggle="tab" href="#information" @if($status == 1) data-status="1" @endif>Order info</a>
                                <a href="{{action('PackageController@index')}}" class="btn btn-link" type="submit">Select another package</a>
                            </div>
                        </div>

                    </div><!--End #basic-info-->

                    <div id="information" class="tab-pane fade">
                        <div class="col-md-12">
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label text-right">Name</label>
                                <div class="col-md-7">
                                    <input
                                    @if($buyer != "")
                                    value="{{ $buyer->name }}"
                                    @endif
                                     type="text" id="name" class="form-control" placeholder="Name"  name="name_order" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label text-right">Email</label>
                                <div class="col-md-7">
                                    <input
                                    @if($buyer != "")
                                    value="{{ $buyer->email }}"
                                    @endif
                                     type="email" id="name" class="form-control" placeholder="Email" name="email_order" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label text-right">Phone</label>
                                <div class="col-md-7">
                                    <input
                                        @if($buyer != "")
                                    value="{{ $buyer->phone }}"
                                    @endif
                                     type="number" id="name" class="form-control" placeholder="Phone" name="phone_order" required autofocus>
                                </div>
                            </div>
                            @if($company == 0)
                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label text-right">Company name</label>
                                <div class="col-md-7">
                                    <input type="text" id="name" class="form-control" placeholder="Company name" name="company_order" required autofocus>
                                </div>
                            </div>
                            @endif

                            <div class="form-group row">
                                <label class="col-md-2"></label>
                                <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" value="Order package">
                                    <a class="btn btn-default" data-toggle="tab" href="#basic-info">Quay lại</a>
                                </div>
                            </div>

                        </div>

                    </div><!--End #information-->

                    </div>
                    
                </div>
                
            </form>


        </div>
    </div>

</div>
<div id="rData"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/js/coupon/check.js') }}"></script>

@endsection

@section('extra_footer')
<script src="{{asset('/js/getaco.js')}}"></script>
@endsection