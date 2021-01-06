@extends('layouts.admin')
@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Company trash list </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Company phone</th>
                            <th>Company email</th>
                            <th>Website</th>
                            <th>Business type</th>
                            <th>Time zone</th>
                            <th>Curency</th>
                            <th>Sort order</th>
                            <th>Company status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{ $company['id_company'] }}</td>
                            <td>{{ $company['company_name'] }}</td>
                            <td>{{ $company['company_description'] }}</td>
                            <td>{{ $company['company_address'] }}</td>
                            <td>{{ $company['company_phone'] }}</td>
                            <td>{{ $company['company_email'] }}</td>
                            <td>{{ $company['website'] }}</td>
                            <td>{{ $company['business_type'] }}</td>
                            <td>{{ $company['timezone'] }}</td>
                            <td>{{ $company['curency'] }}</td>
                            <td>{{ $company['sort_order'] }}</td>
                            <td>{{ $company['company_status'] }}</td>
                            <td scope="col"><a href="untrash?id={{ $company['id_company'] }}" class="btn btn-warning">Un Trash</a></td>
                            <td scope="col"><a href="delete?id={{ $company['id_company'] }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection