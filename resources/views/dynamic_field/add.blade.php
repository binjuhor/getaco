@extends('layouts.app')

@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add Dynamic Field </div>
            <div class="panel-body">
                <form action="{{URL::action('DynamicFieldController@add')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Customer</label>
                        <div class="col-md-10">
                            <select name="id_customer" id="" class="form-control form-control-sm available">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id_customer}}">{{$customer->customer_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Key field</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Key field" name="key_field">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Value field</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Value field" name="value_field">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Sort order</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="order" name="sort_order">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Add Dynamic
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
