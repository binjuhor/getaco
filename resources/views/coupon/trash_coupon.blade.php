@extends('layouts.admin')

@section('content')
    <div class="row full-width">
        <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Trash Coupon</div>
                    <span><a href="{{ URL::action('CouponController@index')}}">Coupon</a></span>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                   <th>ID</th>
                                   <th>Title</th>
                                   <th>Coupon</th>
                                   <th>Coupon Code</th>
                                   <th>Expiry Date</th>
                                   <th>Note</th>
                                   <th>Limited</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon['id_coupon']}}</td>
                                    <td>{{$coupon['title_coupon']}}</td>
                                    @if($coupon['type_coupon'] == 1)
                                        <td>{{$coupon['value_coupon']}} %</td>
                                    @else
                                        <td>{{$coupon['value_coupon']}} $</td>
                                    @endif
                                    <td>{{$coupon['code_coupon']}}</td>
                                    <td>{{$coupon['expiry_date']}}</td>
                                    <td>{{$coupon['note']}}</td>
                                    <td>{{$coupon['limited']}}</td>
                                    <td><a href="untrash?id={{$coupon['id_coupon']}}">unTrash</a></td>
                                    <td><a href="admin/coupon/delete?id={{$coupon['id_coupon']}}">Delete</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection