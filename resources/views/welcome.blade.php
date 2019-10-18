@extends('layouts.main')
@php
$musicpath = asset('images/albumart/');

@endphp

@section('content')


    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @if(count($musics) > 0)
                        @foreach($musics as $music)
                        <div class="single-album wow fadeInUp" data-wow-delay="200ms">
                        <img src="images/albumart/{{$music->image}}" alt="">
                            <div class="album-info">
                                <a href="#">
                                <h6>{{Str::limit($music->title, 20)}}</h6>
                                </a>
                            <p>{{$music->artist}}</p>
                            </div>
                        </div>
                        @endforeach

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

</div>
<!--End Containe-->

@if(count($albums) > 0)
    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Spanking New</p>
                        <h2>LATEST ALBUMS</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Album Area -->
      @foreach($albums as $album)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="200ms">
                        <div class="album-thumb">
                        <img src="images/albums/{{$album->image}}" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                            <h5>{{Str::limit($album->name, 20)}}</h5>
                            </a>
                        <p>{{$album->year}}</p>
                        </div>
                    </div>
                </div>
@endforeach

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                    <a href="{{route('album')}}" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->
@endif


@if(count($musics) > 0)
    <!-- ##### Featured Artist Area Start ##### -->
    <section class="mb-4 featured-artist-area section-padding-50 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                    <img src="images/albumart/{{$latest->image}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>Buy What’s New</h2>
                        </div>
                    <p>{{$music->content}}</p>
                        <div class="song-play-area">
                            <div class="song-name">
                            <p>{{$latest->title}}</p>
                            </div>
                            <audio preload="auto" controls>
                            <source src="songs/{{$latest->song}}">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- ##### Featured Artist Area End ##### -->


@endsection


