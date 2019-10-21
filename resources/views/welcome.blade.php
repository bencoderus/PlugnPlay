@extends('layouts.main')


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
                        <img src="images/thumbnails/{{$music->image}}" alt="">
                            <div class="album-info">
                            <a href="{{url('/music/'.$music->slug)}}">
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
        <div class="container">
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
      <div class="col-6 col-sm-6 col-md-4  wow fadeInUp" data-wow-delay="200ms">
        <a href="{{url('/album/'.$album->slug)}}">
             <div class="shadow single-album-area">
                <div class="album-thumb">
                <img src="{{url('/images/thumbnails/'.$album->image)}}" alt="">
                </div>
                <div class="album-info p-4">
                        <h5>{{Str::limit($album->name, 20)}}</h5>
                    <p>{{$album->year}}</p>
                </div>
            </div>
        </a>
        </div>
@endforeach

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                    <a href="{{url('/albums')}}" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->
@endif


@if(count($musics) > 0)
    <!-- ##### Featured Artist Area Start ##### -->
    <section class="mb-4 featured-artist-area section-padding-50 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container wow bounceInDown" data-wow-delay="200ms">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb text-center">
                    <img src="images/thumbnails/{{$latest->image}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>Featured Music</p>
                        <h2>{{$latest->title}}</h2>
                        </div>
                    <p>{{$latest->content}}</p>
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

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <p>Lets' work together</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area  wow fadeInUp" data-wow-delay="200ms">
                        <form id="contactform">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->


@endsection


