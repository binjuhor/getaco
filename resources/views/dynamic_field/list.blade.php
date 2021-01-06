@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Company list </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Key field</th>
                            <th>Value field</th>
                            <th>Sort order</th>
                            <th>Dynamic status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($dynamic_fields as $dynamic_field)
                        <tr>
                            <td>{{ $dynamic_field['id_company'] }}</td>
                            <td>{{ $dynamic_field['id_customer'] }}</td>
                            <td>{{ $dynamic_field['key_field'] }}</td>
                            <td>{{ $dynamic_field['value_field'] }}</td>
                            <td>{{ $dynamic_field['sort_order'] }}</td>
                            <td>{{ $dynamic_field['company_status'] }}</td>
                            <td scope="col"><a href="edit?id={{$dynamic_field['id_dynamic']}}" class="btn btn-primary">Edit</a></td>
                            <td scope="col"><a href="trash?id={{$dynamic_field['id_dynamic']}}" class="btn btn-warning">Trash</a></td>
                            <td scope="col"><a href="delete?id={{$dynamic_field['id_dynamic']}}" class="btn btn-danger">delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-center">{{ $dynamic_fields->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
