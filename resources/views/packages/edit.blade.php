@extends('layouts.admin')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add package </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab"  href="#basic-info">Basic info</a></li>
                    <li><a data-toggle="tab" href="#feature">Features</a></li>
                    <li><a data-toggle="tab" href="#variable">Variable</a></li>
                </ul>
                <div class="clearfix" style="margin-bottom:30px;"></div>

                <form action="{{action('PackageController@edit')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="tab-content">
                        
                        <div id="basic-info" class="tab-pane fade in active">
                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label">Package Name</label>
                                <div class="col-md-10">
                                <input type="hidden" name="id" value="{{$package->id_package}}">
                                <input type="text" id="name" class="form-control" placeholder="Package name" name="name" value="{{$package->name}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 control-label">Package Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="description" placeholder="Description" name="description">{{$package->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-2 control-label">Price</label>
                                <div class="col-md-10">
                                <input type="number" id="price" class="form-control" placeholder="Price" name="origin_price" value="{{$package->origin_price}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label">Status</label>
                                <div class="col-md-10">
                                    <select type="text" class="form-control" name="status">
                                        <option value="default">Select type</option>
                                        <option @if($package->status ==='default') selected @endif value="default">Normal plan</option>
                                        <option @if($package->status ==='highlight') selected @endif value="highlight">Highlight Plan</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div id="feature" class="tab-pane fade">
                            @if(!count($package->feature))
                                <div class="form-group row">
                                    <label for="feature_name" class="col-md-2 control-label">Feature</label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="id_feature[]">
                                        <input type="text" class="form-control" value="" placeholder="Feature name" name="feature_name[]" required>
                                    </div>
                                    <div class="col-md-2">
                                        <select type="text" class="form-control" name="feature_status[]" required>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger sub"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                            @else
                                @foreach ($package->feature as $key => $feature )
                                <div class="form-group row">
                                    <label for="feature_name" class="col-md-2 control-label">Feature</label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="id_feature[]">
                                        <input type="text" class="form-control" value="{{$feature->name}}" placeholder="Feature name" name="feature_name[]" required>
                                    </div>
                                    <div class="col-md-2">
                                        <select type="text" class="form-control" name="feature_status[]" required>
                                            <option @if($feature->status=='yes') selected @endif value="yes">Yes</option>
                                            <option @if($feature->status=='no') selected @endif value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger sub"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                        </div>

                        <div id="variable" class="tab-pane fade">
                            @if(!count($package->variable))
                                <div class="form-group current row">
                                    <label for="variable_name" class="col-md-2 control-label">Variable</label>
                                    <div class="col-md-5">
                                        <input type="hidden" name="id_variable[]">
                                        <input type="text" class="form-control" placeholder="3 months" value="" name="variable_name[]">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control inline" placeholder="$30"  value=""  name="variable_price[]">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger sub"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                            @else
                                @foreach ($package->variable as $key => $variable )
                                <div class="form-group current row">
                                    <label for="variable_name" class="col-md-2 control-label">Variable</label>
                                    <div class="col-md-5">
                                        <input type="hidden" name="id_variable[]">
                                        <input type="text" class="form-control" placeholder="3 months" value="{{$variable->name}}" name="variable_name[]">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control inline" placeholder="$30"  value="{{$variable->variable_price}}"  name="variable_price[]">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger sub"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Update Package</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('extra_footer')
<script src="{{asset('/js/getaco.js')}}"></script>
@endsection