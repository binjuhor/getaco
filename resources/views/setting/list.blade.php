@extends('layouts.layout_setting')
@section('content_setting')
<div class="row plans change_password">
    <div class="info_subscription row">
        <div class="col-md-12">
            @foreach($list_mail as $value)
            <form class="form-horizontal" method="POST" action="{{URL::action('SendMailController@ConfigMail')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id_content" value="{{ $value->id_content }}">
                <div class="row changPass_content">
                    <div class="form-group">
                        <label for="new-password" class="col-md-4 control-label text-left">Type</label>
                        <div class="col-md-6">
                            <select name="mail_type" id="" class="form-control">
                                <option value="notyfi">Send notify</option>
                                <!-- <option value="form">Feedback form</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label text-left">Send notify to</label>
                        <div class="col-md-6">
                            <input id="current-password" type="text" class="form-control" name="mail_address" value="{{$value->mail_address}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label text-left">Mail Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="mail_name" value="{{$value->mail_name}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label text-left">Mail Subject</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="mail_subject" value="{{$value->mail_subject}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label text-left">Mail Content</label>
                        <div class="col-md-6">
                            <textarea  name="mail_content" class="form-control" rows="10" cols="50" style="height: 50px;" required>
                                {{$value->mail_content}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row action">
                    <button type="submit" class="btn btn-primary">
                        UPDATE
                    </button>
                    <a class="btn btn-default" href="{{ route('dellmail',$value->id_content) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection