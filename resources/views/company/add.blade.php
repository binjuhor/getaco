@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add Company </div>
            <div class="panel-body">
                <form action="{{URL::action('CompanyController@add')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Vd: BeauAgency" name="company_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Description" name="company_description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Vd: 57 Láng Hạ - Ba Đình - Hà Nội" name="company_address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company phone</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" placeholder="Vd: 0976264173" name="company_phone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Company email</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Vd: yourmail@example.com" name="company_email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Website</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Vd: www.google.com" name="website" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Business type</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Business type" name="business_type" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Time zone</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" placeholder="Close hour" name="timezone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Curency</label>
                        <div class="col-md-10">
                            <select name="curency" id="" class="form-control" required>
                                <option value disabled="disabled" selected="selected" >Select one</option>
                                <option value="1" >USD</option>
                                <option value="2"  >VND</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label" required>Sort order</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="order" name="sort_order" required>
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