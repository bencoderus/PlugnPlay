@extends('layouts.main')

@section('title')
Latest Musics
@endsection

@section('content')

    <!-- ##### Buy Now Area Start ##### -->
    <div class="oneMusic-buy-now-area mb-100 section-padding-100">
        <div class="container">
            <div class="row">


                <!-- Single Music Area -->
@if(count($songs) > 0)
@foreach($songs as $song)
                <div class="col-12 col-sm-6 col-md-4">
                <a href="{{url('music/'.$song->slug)}}">
                     <div class="shadow single-album-area">
                        <div class="album-thumb">
                        <img src="{{url('images/thumbnails/'.$song->image)}}" alt="">
                        </div>
                        <div class="album-info p-4">
                                <h5>{{$song->title}}</h5>
                            <p>{{$song->artist}}</p>
                        </div>
                    </div>
                </a>
                </div>
@endforeach
                @else
<h1 class="text-center display-4">OOPS NO NEW MUSIC ADDED YET!</h1>
                @endif
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        {{$songs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Buy Now Area End ##### -->

@endsection
