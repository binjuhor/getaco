<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logogetaco/logo.png') }}"/>

    <title>Customer database</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('extra_header')
</head>
<body style="overflow: scroll;" id="getaco" class="getacoEmbed">
<div class="wrapper">
    <!-- Sidebar Holder -->


    <!-- Page Content Holder -->
    <div id="content">
        
        @yield('content')

    </div>

</div>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('extra_footer')
</body>
</html>