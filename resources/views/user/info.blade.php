@extends('layouts.layout_setting')
@section('content_setting')
<div class="row plans edit_profile">
    <div class="info_subscription row">
        <?php $user = Auth::user() ?>
        @if(!isset($edit))
        <div class="col-md-12 profile"  >
            <div class="avatar row" style="background-image: url('{{$user->avatar}}');">
                <div class="avatar_content " style="z-index: -2">
                    @empty($user->avatar)
                     {{$name_profile}}
                    @endisset
                </div>
                <div class="avatar_edit" data-toggle="modal" data-target="#modal_update_avatar">
                    Update
                </div>
            </div>
            <!-- name -->
            <div class="row control_label">
                <label for="" class="col-md-2 ">Name </label>
                <div class="col-md-6 profile_content">
                    {{$user->name}}
                </div>
            </div>
            <!-- phone  -->
            <div class="row control_label">
                <label for="" class="col-md-2 ">Phone </label>
                <div class="col-md-6 profile_content">
                    {{$user->phone}}
                </div>
            </div>
            <!-- Email -->
            <div class="row control_label">
                <label for="" class="col-md-2 ">Email </label>
                <div class="col-md-6 profile_content">
                    {{$user->email}}
                </div>
            </div>
            <!-- company -->
            <div class="row control_label">
                <label for="" class="col-md-2 ">Company </label>
                <div class="col-md-6 profile_content">
                    @foreach($company as $key)
                    @if($user->id_company == $key['id_company'])
                    {{$key['company_name']}}
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="col-md-12 form_edit_profile">
            <form action="{{ URL::action('HomeController@update')}}" class="form-horizontal" method="post">
                {{csrf_field()}}
                <!-- company -->
                <div class="form_edit_content">
                    @if (session('tb'))
                    <div class="form-group">
                        <b class="col-md-offset-2" style="color: #F80C0C;">{{ session('tb') }}</b>
                    </div>
                    @endif
                    <div class="form-group company">
                        <label for="" class="col-md-2 control-label">Company </label>
                        <div class="col-md-6">
                            @foreach($company as $key)
                            @if($user->id_company == $key['id_company'])
                            {{$key['company_name']}}
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group item">
                        <label for="name" class="col-md-2 control-label">Name </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group item">
                        <label for="" class="col-md-2 control-label">Phone </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="action row">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>&nbsp&nbsp&nbsp
                    <a href="{{ URL::action('HomeController@info')}}" class="btn btn_cancel">Cancel</a>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
<div class="action row {{ Request::is('app/user/edit*') ? 'hidden' : '' }}">
    <a href="{{ URL::action('HomeController@edit')}}" class="btn btn-primary text-center">Edit profile</a>
</div>
<div id="modal_update_avatar" class="modal fade" role="dialog">
    <form action="{{ URL::action('HomeController@avatar')}}" enctype='multipart/form-data' method="post">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="height: 40px;padding:7px 15px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Updata Avatar</h5>
            </div>
            <div class="modal-body row" style="height: 100px;padding-top:30px">
                <label for="" class="col-md-4">Choose File</label>
                <input type="file" class="col-md-8" name="avatar">
            </div>
            <div class="modal-footer" style="padding: 5px 10px">
                <button type="submit" class="btn-primary btn" >Update</button>
                <button type="button" class="btn btn_back" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>

</div>
<!-- form edit -->
@endsection
