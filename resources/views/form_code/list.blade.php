@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Form Code list </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Source</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($form_codes as $form_code)
                        <tr>
                            <td>{{ $form_code['id_form_code'] }}</td>
                            <td>{{ $form_code['source'] }}</td>

                            <td scope="col"><a href="edit?id={{$form_code['id_form_code']}}" class="btn btn-primary">Edit</a></td>
                            <td scope="col"><a href="delete?id={{$form_code['id_form_code']}}" class="btn btn-danger">delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection