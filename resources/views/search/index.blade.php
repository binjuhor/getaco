@extends('layouts.app')
@section('extra_header')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-multiselect.css') }}" type="text/css">
@endsection
@section('content')
<form action="{{URL::action('CustomerController@fillter')}}" class="form-horizonal form-row-seperated form1" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row header_list">
        <div class="col-md-6"><h2>Search with keyword: <strong>{{$keyWord}}</strong></h2></div>
        <div class="col-md-6 text-right">
            <a href="{{action('CustomerController@add')}}" class="btn btn-primary"><img src="" alt="">ADD LEAD</a>
        </div>
    </div>

    <div class="row content_table">
        <div class="col-md-12">
            @if($customers)
            <table class="table" id="table_format">
                <thead>
                    <tr>
                        <th class="text-left">NAME</th>
                        <th class="text-left">PHONE</th>
                        <th class="text-left">EMAIL</th>
                        <th class="text-left">MODIFY</th>
                        @can('ctm_act')<th class="text-center">ACTION</th>@endcan
                    </tr>
                </thead>

                <tbody>
                    @foreach($customers as $index => $cus)
                    <tr>
                        <td class="text-left"><a href="{{URL::action('CustomerController@detail')}}?id={{$cus['_id']}}" class="btn-link name">{{ $cus['_source']['customer_name'] }}</a></td>
                        <td class="text-left">{{ $cus['_source']['customer_name'] }}</td>
                        <td class="text-left">{{ $cus['_source']['customer_phone'] }}</td>
                        <td class="text-left">{{ date('d M Y', strtotime($cus['_source']['updated_at']['date'])) }}</td>
                        @can('ctm_act')
                        <td  class="text-center" style="white-space:nowrap;">
                            <a href="{{action('CustomerController@edit')}}?id={{$cus['_id']}}" title="Edit" class="btn-action btn-edit"></a>
                            <a href="{{action('CustomerController@delete')}}?id={{$cus['_id']}}"  title="Delete" class="btn-action btn-delete"></a>
                            @if($cus['_source']['type'] == 'lead')
                            <a href="{{action('CustomerController@lead')}}?id={{
                                $cus['_id']
                                }}" title="Become Customer" class="btn-action btn-become"></a>
                            @endif
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div class="row footer_list">
                <div class="show_cus col-md-2 text-left">
                    {{-- Showing : <span></span> --}}
                </div>
                <div class = "col-md-8 text-center pagination_content">
                    <ul class="pagination">
                        @for($i=0; $i<10; $i++ )
                        <li @if($i == $page )class="active"@endif>
                            <a href="{{ 
                                URL::action('SearchController@search')
                                }}?key={!! $keyWord !!}&page={{ $i }}&lim={{ $lim }}">{{ $i+1 }}
                            </a>
                        </li>
                        @endfor
                    </ul>
                </div>
                <div class="col-md-2 total_cus text-right">
                    {{--Total customer : <span> $customers->total()</span> --}}
                </div>
            </div>
            @endif 
            @if(!$customers)
            <h1>No record found with: <strong>{{ $keyWord }}</strong></h1>
            @endif

        </div>
    </div>
</form>

@endsection