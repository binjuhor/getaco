@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Company </div>
            <div class="panel-body">
                <form action="{{URL::action('CompanyController@update')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_company" value="{{$companies->id_company}}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->company_name}}" name="company_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->company_description}}" name="company_description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->company_address}}" name="company_address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company phone</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" value="{{$companies->company_phone}}" name="company_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company email</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->company_email}}" name="company_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Website</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->website}}" name="website">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Business type</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->business_type}}" name="business_type">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Time zone</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" value="{{$companies->timezone}}" name="timezone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Curency</label>
                        <div class="col-md-10">
                            <select name="curency" id="" class="form-control">
                                <option value="1" selected="selected" required >USD</option>
                                <option value="2" selected="selected" >VND</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Sort order</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->sort_order}}" name="sort_order">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company status</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$companies->company_status}}" name="company_status">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Add Company
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection