@extends('layouts.admin')
@section('content')

<div class="row header_list">
    <div class="col-md-6 table_title"><h2>List User</h2></div>
    @can('action_user')
    <span class="col-md-6 text-right"><a href="{{ url('app/user/add') }}" class="btn btn-primary"><img src="" alt="">Add user</a></span>
    @endcan
</div>           
<div class="row content_table">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Business type</th>
                        <th>Time zone</th>
                        <th>Curency</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </tr>
        </thead>
        <tbody>
           @foreach($companies as $index => $company)
           <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $company['company_name'] }}</td>
            <td>{{ $company['company_address'] }}</td>
            <td>{{ $company['company_phone'] }}</td>
            <td>{{ $company['company_email'] }}</td>
            <td>{{ $company['website'] }}</td>
            <td>{{ $company['business_type'] }}</td>
            <td>{{ $company['timezone'] }}</td>
            <td>{{ $company['curency'] }}</td>
            <td>{{ $company['company_status'] }}</td>
            <td colspan="2"  class="text-center" style="white-space:nowrap;">
                <a href="edit?id={{ $company['id_company'] }}" title="Edit" class="btn-action btn-edit"></a>
                <a href="delete?id={{ $company['id_company'] }}"  title="Delete" class="btn-action btn-delete" ></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row footer_list">
    <div class="show_cus col-md-2 text-left">
        <!-- Showing : <span></span> -->
    </div>
    <div class = "col-md-8 text-center pagination_content">{{ $companies->links() }}</div>
</div>
</div>
</div>


@endsection