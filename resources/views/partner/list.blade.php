@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{!! Session::token() !!}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <b class="col-md-10">Partner</b>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;">STT</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Order</th>
                            <th>Company</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>

                        @foreach($list as $key => $value)
                        <tbody>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->email }}</td>
                            <td><a href="javascript:void(0)" class="view_order" url=" {{ action('PartnerController@orderDetail') }} " data ="{{ $value->id_order }}" style= "color: #1629DF;">Order {{ $value->id_order }}</a></td>
                            <td>
                                @foreach($company as $check)
                                    @if($check->id_company == $value->id_company)
                                    {{ $check->company_name }}
                                    @endif
                                @endforeach
                            </td>
                            
                            <th style="text-align: center;">
                                <a href="{{ URL::action('PartnerController@del',$value->id_partner) }}" class="btn btn-link" onclick="return window.confirm('You sure delete user ?');" >Delete</a>&nbsp&nbsp
                            </th>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Order Detail</h4>
        </div>
        <div class="modal-body">
            <div class="form-group row form-inline">
                <label class="col-md-4 control-label text-right">Package name :</label>
                <div class="col-md-7">
                    <b id="package_name"></b>
                </div>
            </div>
            <div class="form-group row form-inline">
                <label class="col-md-4 control-label text-right">Limited :</label>
                <div class="col-md-7">
                    <b id="package_limmit"></b>
                </div>
            </div>
            <div class="form-group row form-inline">
                <label class="col-md-4 control-label text-right">Total :</label>
                <div class="col-md-7">
                    <b id="package_total"></b>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/js/coupon/order_detail.js') }}"></script>

@endsection