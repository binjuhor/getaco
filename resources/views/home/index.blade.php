@extends('layouts.index')

@section('content')

<h1 class="text-center">Wating the HTML page to dsplay all page</h1>

<div class="container">
    <div class="row">
       <div class="col-md-6">
           {{-- @auth
           <a class="btn btn-link pull-left" href="{{ action('PackageController@add') }}">Add New Package </a>
           @endauth --}}
       </div>
        <div class="col-md-6 text-right">
            @auth
            <a class="btn btn-link" href="/app">Trang quản lý</a>
            @endauth
            @guest
            <a href="/login" class="btn btn-link">Đăng nhập</a>
            <a href="/register" class="btn btn-link">Đăng ký</a>
            @endguest
        </div>
    </div>

    <div class="row">
        @foreach ($packages as $index => $package )
        <div class="col-md-4 tex-center">
            <div class="panel panel-default">
            <div class="panel-heading">{{ $package->name }}
                
                @if($package->status === 'highlight')
                    - Package highlight
                @endif

                @auth
                    <a href="{{ action('PackageController@delete') }}?id={{$package->id_package}}" class="pull-right"> Delete</a> 
                    <a href="{{ action('PackageController@edit') }}?id={{$package->id_package}}" class="pull-right">Edit&nbsp;|&nbsp;</a>
                @endauth
            </div>
                <div class="panel-body">
                    <ul>
                        @foreach ($package->feature as $num => $feature )
                            <li>
                                {{ $feature->name }}
                                @if (trim($feature['status'])=='yes')
                                    <i class="fa fa-check"></i>
                                @else
                                    <i class="fa fa-times"></i>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @if($check == 0)
               <a class="btn btn-primary " href="{{ action('PackageController@order') }}?id={{ $package->id_package }}" data-packid="{{$package->id_package}}">Buy now {{$package['origin_price']}} Vnđ</a>
               @endif
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
@endsection

@section('extra_footer')
<script src="{{asset('/js/getaco.js')}}"></script>
@endsection