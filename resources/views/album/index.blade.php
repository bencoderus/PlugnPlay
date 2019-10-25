@extends('layouts.main')

@section('title')
Latest Albums
@endsection

@section('content')

    <!-- ##### Buy Now Area Start ##### -->
    <div class="oneMusic-buy-now-area mb-100 section-padding-100">
        <div class="container">
            <div class="row">


                <!-- Single Music Area -->
@if(count($albums) > 0)
@foreach($albums as $album)
                <div class="col-12 col-sm-6 col-md-4  wow fadeInUp" data-wow-delay="200ms">
                <a href="{{url('/album/'.$album->slug)}}">
                     <div class="shadow single-album-area">
                        <div class="album-thumb">
                        <img src="{{url('/images/thumbnails/'.$album->image)}}" alt="">
                        </div>
                        <div class="album-info p-4">
                                <h5>{{$album->name}}</h5>
                            <p>{{$album->year}}</p>
                        </div>
                    </div>
                </a>
                </div>
@endforeach
                @else
<h1 class="text-center display-4">OOPS NO NEW ALBUM ADDED YET!</h1>
                @endif
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        {{$albums->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Buy Now Area End ##### -->

@endsection
