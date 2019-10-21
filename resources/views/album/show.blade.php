@extends('layouts.main')



@section('content')

    <!-- ##### Buy Now Area Start ##### --></div>
    <div class="section-padding-100">
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
       <div class="container  wow fadeInUp" data-wow-delay="300ms">
        <div class="row">
                <!-- Single Album Area -->
                <div class="col-md-4">
                        <div class="text-center">
                        <img src="{{url('/images/thumbnails/'.$album->image)}}" alt="" style="width: 100%;">
                                <div class="p-3">
                                        <p class="h5 text-uppercase font-weight-bold">{{$album->name}}</p>
                                        <p>{{$album->year}}</p>
                                </div>

                        </div>
                </div>
                <div class="col-md-8 p-4">

                    @foreach($album->music as $music)
                <p><span class="text-muted"><b>{{$loop->iteration}}.</b> <a href="{{url('/music/'.$music->slug)}}">{{$music->title}}</a> </span> <span class="float-right albummusic">        <audio preload="auto" controls>
                <source src="{{url('/songs/'.$music->song)}}">
                                </audio>
          </span></p><hr/>
                    @endforeach

            </div>

</div>

        <div class="row">


        </div>
    </div>


                </div></div>
    </section></div>
@endsection
