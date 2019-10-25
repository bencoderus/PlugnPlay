@extends('layouts.main')

@section('title')
Page not found
@endsection

@section('content')


<div class="section-padding-100 text-center">
    <h1 class="display-2">
        404
    </h1>
    <h2>PAGE NOT FOUND</h2>
    <p>

    </p>
<p class="lead">Sorry the page you are looking for was not found.</p>
<p><a href='{{url('/')}}' class='btn oneMusic-btn mt-10'>Go back home</a></p>
</div>

@endsection
