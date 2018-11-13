<?php $current_route=Route::currentRouteName(); ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel TEST | @yield('title')</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{!!asset('css/bootstrap.css')!!}" />
    <link rel="stylesheet" href="{!!asset('css/core.css')!!}" />
</head>
<body>
@if($current_route=='home')
<a href="{{URL::route('new')}}" class="btn-sm btn-primary btn-top">Crear Usuario &#x2192;</a>
@else
<a href="{{URL::route('home')}}" class="btn-sm btn-gray btn-top">&#x2190; Regresar</a>
@endif
    <div class="row">
        <div class="col-md-6 box-left hidden-xs hidden-sm">
            <div class="desc">
                @include('include.description')
            </div>
        </div>
        <div class="col-md-6 col-md-offset-6 text-center">
            <div class="padding-8050">
                <!-- Mensaje Global -->
                @if(Session::has('global-message'))
                    <div class="alert alert-info" role="alert">{{ Session::get('global-message') }}</div>
                @endif
                @if(Session::has('global-success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('global-success') }}</div>
                @endif
                @if(Session::has('global-error'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('global-error') }}</div>
                @endif

                <h1>@yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </div>
<script src="{!!asset('js/jquery.min.js')!!}"></script>
<script src="{!!asset('js/core.js')!!}"></script>
</body>
</html>