@extends('layouts.app')
@section('content')

<div class="row">
    <div class="form-group btn_cus_back">
        <a href="{{ URL::action('CustomerController@index')}}" title="Back" class="btn btn-back text-right">Back</a>
    </div>
    <div class="col-md-4 form-group info_cus" >
        <!-- info -->
        @include("customer.info")
        <!-- end info -->
        <!-- form update -->
        @include("customer.update")
        <!-- end form update -->
</div>
<!-- comment -->
@include("customer.comment")
<!-- end comment -->
</div>
<div class="col-md-4 let_start">
    <div class="form-group text-center">
        <img src="{{ asset('iconSVG/undraw-checklist-7-q-37.svg') }}" alt="">
        <div class="text1">Welcome to Getask</div>
        <div class="text2">Suport tool and tracking prompt tool should be work</div>
        <div class="btn btn-primary">LET'S START</div>
    </div>
</div>
</div>
</div>

<form action="{{action('CustomerController@tag_comment')}}" id="tag_comment" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="tag_comment" class="tag_input">
    <input type="hidden" name="tag_id" class="id_tag">
    <input type="hidden" name="id_customer" value="{{$customer->id_customer}}">
</form>
<form action="{{action('CustomerController@edit_comment')}}" method="post" id="edit_comment">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_comment" id="id_comment">
    <input type="hidden" name="txt_comment" id="txt_comment">
</form>


<!-- check -->
<input type="hidden" value="{{$detail_edit}}" id="check_page_detail">
@endsection
@section('extra_footer')
<script type="text/javascript" src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/customer/edit_customer.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/swap.js') }}"></script>
<script>
    var url_set_attr = "{{ URL::action('CustomerAttributeController@selected') }}";
    var url_comment_sticky = "{{ URL::action('CustomerController@stickyComment') }}";
</script>

<script type="text/javascript" src="{{ asset('/js/customer/addCustomer.js') }}"></script>
@endsection