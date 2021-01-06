@extends('layouts.app')
@section('extra_header')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-multiselect.css') }}" type="text/css">
    <!-- Fonts -->
@endsection
@section('content')
<div class="row header_list">
       
        <div class="col-md-6"><h2>User history</h2></div>
        <div class="col-md-6 text-right">
        </div>
    </div>



    <div class="row content_table">
        <div class="col-md-12">
            <table class="table table-noaction" id="table_format">
                <thead>
                    <tr>
                        <th class="text-left">NAME</th>
                        <th class="text-left">PHONE</th>
                        <th class="text-left">EMAIL</th>
                        <th class="text-center">COMMENT</th>
                        <th class="text-center">ADD/REMOVE STATUS</th>
                       <th class="text-center">BECOME CUSTOMER</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $key => $val)
                    <tr>
                        <td class="text-left" style="padding-left: 25px;">{{ $val->name }}</td>
                        <td class="text-left">{{ $val->phone }}</td>
                        <td class="text-left">{{ $val->email }}</td>
                        <td class="text-center">{{ $comment[$key] }} </td>
                        <td class="text-center">{{ $add_tag[$key] }} </td>
                        <td class="text-center">{{ $become[$key] }}</td>
                    </tr>
                    @endforeach
                    @if(count($user) == 0)
                        <tr class="text-center">
                            <td colspan="6">No data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
          

        </div>
    </div>

@endsection