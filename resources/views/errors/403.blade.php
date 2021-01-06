@extends('layouts.app')

@section('content')
@if(Auth::User()->id_role == 1)
<div class="erro">
  <div class="overlay1"></div>
  <div class="terminal">
    <h1>Bạn cần mua gói để sử dụng được chức năng này .</h1><br>
    <p class="output1">Bạn có thể mua gói trong Setting Subscription hoặc liên hệ với chúng tôi để được hỗ trợ .</p>
    <p class="output1">Email : <b>info@beau.vn</b></p>
    <p class="output1">Phone : <b>0869291771</b></p>

  </div>
</div>
@elseif(Auth::User()->id_role > 1)
<div class="erro">
  <div class="overlay1"></div>
  <div class="terminal">
    <h1>Error <span class="errorcode">403</span></h1>
    <p class="output1">Sory. You have not been granted permission !</p>

  </div>
</div>
@endif
@endsection