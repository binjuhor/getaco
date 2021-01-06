@extends('layouts.app')

@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Dynamic Field </div>
            <div class="panel-body">
                <form action="{{URL::action('DynamicFieldController@update')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_dynamic" value="{{$dynamic_fields->id_dynamic}}">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Customer</label>
                        <div class="col-md-10">
                            <select name="id_customer" id="" class="form-control form-control-sm">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id_customer}}"
                                            @if($dynamic_fields['id_customer'] == $customer['id_customer'])
                                            selected="selected"
                                            @endif
                                    >{{$customer->customer_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Key field</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$dynamic_fields->key_field}}" name="key_field">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Value field</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$dynamic_fields->value_field}}" name="value_field">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Sort order</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$dynamic_fields->sort_order}}" name="sort_order">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Dynamic status</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$dynamic_fields->dynamic_status}}" name="dynamic_status">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Edit Company
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
