@extends('layouts.admin')

@section('content')

<div class="row header_list">
    <div class="col-md-6"><h2>Coupon List</h2></div>
    <div class="col-md-6 text-right">
        <a href="{{ URL::action('CouponController@add')}}" class="btn btn-primary">
            <img src="">Add Coupon</a>

            <a class="btn btn-success" href="{{ URL::action('CouponController@trashList')}}">Trash</a>
        </div>
    </div>
    <div class="row content_table">
        <div class="col-md-12">
            <table class="table" id="table_format">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Coupon</th>
                        <th>Coupon Code</th>
                        <th>Expiry Date</th>
                        <th>Note</th>
                        <th>Limited</th>
                        <th class="text-center">Action</th>
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

                    <td class="text-center">
                        <a href="{{ URL::action('CouponController@add') }}?id={{$coupon['id_coupon']}}"  title="Edit" class="btn-action btn-edit"></a>
                        <a href="{{ URL::action('CouponController@delete') }}?id={{$coupon['id_coupon']}}" onclick="return confirm('Are you sure ?')" title="Delete" class="btn-action btn-delete action_delete"></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="row footer_list">
            <div class = "col-md-12 text-center pagination_content"></div>
        </div>

    </div>
</div>
@endsection