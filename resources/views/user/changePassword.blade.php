@extends('layouts.layout_setting')
@section('content_setting')
    <div class="row plans change_password">
        <div class="info_subscription row">
            <div class="col-md-12">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{URL::action('HomeController@changePassword')}}">
                    {{ csrf_field() }}
                    <div class="row changPass_content">
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label text-left">Current Password</label>
                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label text-left">New Password</label>
                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                    <strong>{{ $errors->first('new-password') }}</strong>
                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label text-left">Confirm New Password</label>
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
                    </div>


                        <div class="row action">
                            <button type="submit" class="btn btn-primary">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection