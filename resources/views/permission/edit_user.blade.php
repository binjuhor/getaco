@extends('layouts.app')

@section('content')
<div class="row">
    <div class="row title_page">
        <div class="col-md-12 "><h2>Edit User</h2></div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               @foreach($arr as $key)
                <form action="{{ url('app/user/edit/'.$key['id']) }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Vd: My Name" name="name" value="{{ $key['name'] }}" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="customer_phone" placeholder="Vd: 0976264173" value="{{ $key['phone'] }}" name="phone" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Vd: yourmail@example.com" value="{{ $key['email'] }}" name="email" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Role</label>
                        <div class="col-md-10">
                          <select class="form-control" name="role">
                            <option value="2" {{ isset($key['id_role'])&&$key['id_role'] == 2?"selected=''":"" }}>High</option>
                            <option value="3" {{ isset($key['id_role'])&&$key['id_role'] == 3?"selected=''":"" }}>Medium</option>
                            <option value="4" {{ isset($key['id_role'])&&$key['id_role'] == 4?"selected=''":"" }}>Low</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" placeholder="*********" name="password" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label"></label>
                        <div class="col-md-10">
                            <label for="usr" style="color: red;">
                                @if(isset($tb))
                                  {{ $tb }}
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-2">
                            <input type="submit" class="btn btn-primary" value="SAVE CHANGER">
                        </div>
                    </div>
                  
                </form>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection