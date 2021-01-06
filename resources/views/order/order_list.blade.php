@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <b class="col-md-10">LIST ORDER</b>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;">STT</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Package</th>
                            <th>Limited</th>
                            <th>Total</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>

                        @foreach($order as $key => $value)
                        <tbody>
                            <td style="text-align: center;">{{ $key+1 }}</td>
                            <td>{{ $value->name_order }}</td>
                            <td>{{ $value->phone_order }}</td>
                            <td>{{ $value->email_order }}</td>
                            <td>
                            @foreach($Company as $com)
                                @if( $value['id_company'] == $com['id_company'])
                                    {{ $com->company_name }}
                                @endif
                            @endforeach
                            </td>
                            @foreach($package as $pac)
                                @if( $value['id_package'] == $pac['id_package'])
                                    <td>{{ $pac->name }}</td>
                                @endif
                            @endforeach

                            @foreach($limited as $lim)
                                @if( $value['id_variable'] == $lim['id_variable'])
                                    <td>{{ $lim->name }}</td>
                                @endif
                            @endforeach
                            <td>{{ $value->total_pay }} $</td>
                            <th style="text-align: center;">
                                <a href="{{ url('admin/package/order/del/'.$value['id_order']) }}" class="btn btn-link" onclick="return window.confirm('You sure delete user ?');" >Delete</a>
                            </th>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection