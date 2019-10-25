@extends('layouts.main')

@section('title')
{{$song->title}}
@endsection

@section('content')

    <!-- ##### Buy Now Area Start ##### --></div>
    <div class="section-padding-100">
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
       <div class="container">
        <div class="row">
                <!-- Single Album Area -->
                <div class="col-md-4">
                        <div class="text-center">
                        <img src="{{url('/images/albumart/'.$song->image)}}" alt="" style="width: 100%;">
                        </div>
                </div>
                <div class="col-md-8 p-4">
                        <p class="h5"> {{$song->artist}}</p>
                    <p class="h4"><b>{{$song->title}}</b></p>
                    @if($song->album_id > 0)
                    <p class="h5 text-success">
                    <a href="{{url('/album/'.$song->album->slug)}}"> {{$song->album->name}}</a>
                       </p>
                    @endif
                    <p><b>Added:</b>  {{mydate($song->created_at)}}</p>
                <p><b>Hints:</b> {{$song->views}}</p>
                <p>
                        <a href="#" class="btn btn-xs oneMusic-btn btn-2">Save to device</a>
                </p>


            </div>

</div>
{{-- Row end --}}
<div class="row">
        <div class="col-md-12">
                <div class="mymusic m-4">
                        <audio preload="auto" controls>
                        <source src="{{url('/songs/'.$song->song)}}">
                                    </audio>
                                </div>
                    </div>
        </div>
        {{-- Player end --}}
        <br>
        <h4>More Music By {{$song->artist}}</h4>
        <div class="row">
                @foreach($musics as $music)
                <div class="col-6 col-sm-6 col-md-3">
                <a href="{{url('/music/'.$music->slug)}}">
                             <div class="shadow single-album-area">
                                <div class="album-thumb">
                                <img src="{{url('/images/thumbnails/'.$music->image)}}" alt="">
                                </div>
                                <div class="p-4">
                                        <h5>{{$music->title}}</h5>
                                </div>
                            </div>
                        </a>
                        </div>

                @endforeach

        </div>
    </div>


                </div></div>
    </section></div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dac395226236a2b"></script>

@endsection
