@extends('layouts.app')
@section('content')



<div class="setting">
    <div class="row setting_title">
        <h2>Setting</h2>
        <span>Select one style available or create new style</span>
    </div>

    <div class="row setting_content">
        <div class="col-md-2 setting_menu">
            <ul>
                <li class="{{ Request::is('app/setting/info*') ? 'active' : '' }}">
                    <svg  width="18" height="18" viewBox="0 0 18 18">
                        <path id="facebook1" fill="#B2B2B2" fill-rule="nonzero" d="M9 0a9 9 0 1 0 0 18A9 9 0 0 0 9 0zM4.935 7.258a4.065 4.065 0 1 1 8.13 0 4.065 4.065 0 0 1-8.13 0zm9.741 6.266c-2.916 3.644-8.433 3.648-11.352 0a3.473 3.473 0 0 1 2.482-1.04h.661a5.81 5.81 0 0 0 5.066 0h.66c.972 0 1.851.398 2.483 1.04z"></path>
                    </svg>
                    <a href="{{ URL::action('HomeController@info') }}">Profile</a>
                </li>
                @can('cpn_info')
                <li class="{{ Request::is('app/setting/company*') ? 'active' : '' }}">
                    <svg  width="16" height="18" viewBox="0 0 16 18">
                        <path id="facebook2" fill="#B2B2B2" fill-rule="nonzero" d="M1.684 7.714v6h2.527v-6H1.684zm5.053 0v6h2.526v-6H6.737zM0 18h16v-2.571H0V18zM11.79 7.714v6h2.526v-6h-2.527zM8 0L0 4.286V6h16V4.286L8 0z"></path>
                    </svg>
                    <a href="{{ URL::action('CompanyController@view') }}">Company info</a>
                </li>
                @endcan
                @can('Cart')
                <li class="{{ Request::is('app/setting/cart/item*') ? 'active' : '' }}">
                    <svg  width="18" height="18" viewBox="0 0 18 18">
                        <path id="facebook3" fill="#B2B2B2" fill-rule="nonzero" d="M13.5 16.2a.901.901 0 0 1-.9-.9c0-1.189 1.8-1.19 1.8 0 0 .496-.404.9-.9.9zm-10.8 0a.901.901 0 0 1-.9-.9c0-.496.404-.9.9-.9s.9.404.9.9-.404.9-.9.9zm.9-12.6a1.8 1.8 0 0 0-1.8 1.8v7.366a2.692 2.692 0 0 0 .393 5.188A2.703 2.703 0 0 0 5.4 15.3a2.691 2.691 0 0 0-1.8-2.534V12.6h9v.166a2.692 2.692 0 0 0 .393 5.188A2.703 2.703 0 0 0 16.2 15.3a2.691 2.691 0 0 0-1.8-2.534V2.7a.9.9 0 0 1 .9-.9h1.8a.9.9 0 0 0 0-1.8h-2.7a1.8 1.8 0 0 0-1.8 1.8v1.8h-9z"></path>
                    </svg>
                    <a href="{{ URL::action('CartController@item') }}">Subscription</a>
                </li>
                @endcan
                <li class="{{ Request::is('app/setting/mail*') ? 'active' : '' }} config_mail">
                    <span class="glyphicon glyphicon-envelope config_icon" style="{{ Request::is('app/setting/mail*') ? 'color:#ff4669' : '' }}"></span>
                    <a href="{{ route('configmail') }}"> &nbspConfig gmail</a>
                </li>
                <li class="{{ Request::is('app/setting/change*') ? 'active' : '' }}">
                    <svg  width="18" height="18" viewBox="0 0 18 18">
                        <path id="facebook4" fill="#B2B2B2" fill-rule="nonzero" d="M18 6.188a6.187 6.187 0 0 1-7.342 6.08l-.844.949a.844.844 0 0 1-.63.283H7.875v1.406a.844.844 0 0 1-.844.844H5.625v1.406a.844.844 0 0 1-.844.844H.844A.844.844 0 0 1 0 17.156v-2.744c0-.224.089-.438.247-.597l5.688-5.688A6.187 6.187 0 0 1 11.812 0 6.175 6.175 0 0 1 18 6.188zM11.812 4.5a1.687 1.687 0 1 0 3.375 0 1.687 1.687 0 0 0-3.374 0z"></path>
                    </svg>
                    <a href="{{ URL::action('HomeController@change') }}">Password</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 subscription_content">
            @yield('content_setting')
        </div>
    </div>
</div>
@endsection