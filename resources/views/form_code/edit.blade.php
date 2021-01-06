@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Form code </div>
            <div class="panel-body">
                <form action="{{URL::action('FormCodeController@update')}}" class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_form_code" value="{{$form_codes->id_form_code}}">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Form</label>
                        <div class="col-md-10">
                            <select name="id_form" id="" class="form-control form-control-sm">
                                @foreach($forms as $form)
                                    <option value="{{$form->id_form}}"
                                        @if($form['id_form'] == $form_codes['id_form'])
                                        selected="selected"
                                        @endif
                                    >{{$form->form_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 control-label">Source</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="{{$form_codes->source}}" name="source">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Add Form code
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection