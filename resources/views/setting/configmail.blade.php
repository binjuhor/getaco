@extends('layouts.layout_setting')
@section('content_setting')
    <div class="row plans change_password">
        <div class="info_subscription row">
            <div class="col-md-12">
                <form class="form-horizontal" method="POST" action="{{URL::action('SendMailController@ConfigMail')}}">
                    {{ csrf_field() }}
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
                                <input id="current-password" type="text" class="form-control" name="mail_address" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label text-left">Mail Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mail_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label text-left">Mail Subject</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mail_subject" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label text-left">Mail Content</label>
                            <div class="col-md-6">
                                <textarea  name="mail_content" class="form-control" rows="10" cols="50" style="height: 50px;" required>
                                </textarea>
                            </div>
                        </div>
                    </div>
                        <div class="row action">
                            <button type="submit" class="btn btn-primary">
                                SAVE
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection