<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/vendor/admin/main.css') }}" rel="stylesheet">
<link href="{{ asset('/vendor/toastr/toastr.min.css') }}" rel="stylesheet">
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
<title>
Admin Dashboard</title>
</head>
<body>
<div id="app">
<div class="container-fluid" id="wrapper">
<div class="row">
<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
<h1 class="site-title"><a href="/"><img src="{{asset('images/logo-light.png')}}" alt=""> {{config('app.name')}} </a></h1>

<a href="#menu-toggle" class="btn" id="menu-toggle"><em class="fas fa-bars"></em></a>
<ul class="nav nav-pills flex-column sidebar-nav">
<li class="nav-item"><a class="nav-link {{Request::path()=="admin" ? 'active' : ''}}" href="/admin"><em class="fas fa-home"></em> Dashboard</a></li>
<li class="nav-item"><a class="nav-link {{Request::path()=="admin/musics" ? 'active' : ''}}" href="/admin/musics"><em class="fas fa-music"></em> Musics</a></li>
<li class="nav-item"><a class="nav-link {{Request::path()=="admin/albums" ? 'active' : ''}}" href="/admin/albums"><em class="fas fa-compact-disc"></em> Albums</a></li>
<li class="nav-item"><a class="nav-link {{Request::path()=="admin/events" ? 'active' : ''}}" href="/admin/events"><em class="fas fa-calendar"></em> Events</a></li>
<li class="nav-item"><a class="nav-link {{Request::path()=="admin/bio" ? 'active' : ''}}" href="/admin/settings"><em class="fas fa-cog"></em> Settings</a></li>
<li class="nav-item">
<a class="nav-link" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();"> <em class="fas fa-toggle-off"></em>
{{ __('Logout') }}
</a></li>
</ul>
</nav>
<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
@yield('content')
</main>
<br><br>


</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div id="loading" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Please wait...
</div>


</body>
@stack('script')
<script src="{{ asset('/vendor/admin/main.js') }}"></script>
</html>
