@extends('layouts.app')

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
                <tr>
                <th class="text-left">NAME</th>
                <th class="text-left">PHONE</th>
                <th class="text-left">EMAIL</th>
                <th class="text-left">PERMISSION</th>
                @can('action_user')
                <th class="text-center">ACTION</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($user as $key => $value)
                <tr>
                    <td class="text-left">{{ $value['name'] }} </td>
                    <td class="text-left">{{ $value['phone'] }} </td>
                    <td class="text-left">{{ $value['email'] }} </td>

                    <td >
                        {{ isset($value['id_role'])&&$value['id_role'] == 4?"Low":"" }}
                        {{ isset($value['id_role'])&&$value['id_role'] == 3?"Medium":"" }}
                        {{ isset($value['id_role'])&&$value['id_role'] == 2?"High":"" }} 
                    </td>
                @can('action_user')
                <th class="text-center">
                    <a href="{{ url('app/user/edit/'.$value['id']) }}" title="Edit" class="btn-action btn-edit" style="margin-right: 10px;"></a>
                    <a href="javascript:void(0)" url_action_delete="{{ url('app/user/del/'.$value['id']) }}" title="Delete" class="btn-action btn-delete action_delete" ></a>
                </th>
            @endcan
                </tr>
            @endforeach
            @if(count($user) == 0)
                <tr>
                    <td class="text-center" colspan="5">No data</td>
                </tr>
            @endif
        </tbody>
        </table>
    </div>
</div>
@endsection