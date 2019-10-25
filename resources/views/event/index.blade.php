@extends('layouts.main')

@section('title')
Latest Event
@endsection

@section('content')

<section class="events-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single Event Area -->
                @foreach($events as $event)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                        <img src="{{url('/images/thumbnails/'.$event->image)}}" alt="">
                        </div>
                        <div class="event-text">
                        <h4>{{$event->title}}</h4>
                            <div class="event-meta-data">
                            <a href="#" class="event-place">{{Str::limit($event->location, 20)}}</a>
                            <a href="#" class="event-date">{{mydate($event->created_at)}}</a>
                            </div>
                        <a href="#" onclick="showevent({{$event}}, '{{mydate($event->created_at)}}')" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>
@endforeach

            </div>

            <div class="row">
                <div class="col-12">
                    {{$events->links()}}
                </div>
            </div>
        </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="eventmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h5 class="modal-title" id="event-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="fa fa-times"></span>
                  </button>

            </div>
            <div class="modal-body p-4" id="event-body">
        <div class="text-center mb-4">
                <img src="#" id="event-image" width='70%' alt="">
        </div>

                <div id="event-content">

              </div>
              <div class="my-4">

                    <i class="fa fa-map-marker"></i>
                    <span id="event-location" class="mr-4"></span>

                <i class="fa fa-calendar-o"></i>
                <span id="event-date"></span>

                </div>
            </div>
          </div>
        </div>
      </div>
      <script>
    function showevent(event, date){
    $('#event-title').text(event.title)
    $('#event-content').html(event.description)
    $('#event-location').text(event.location)
    let image = '/images/event/' +event.image;
    $('#event-image').attr('src', image)
    $('#event-date').text(date)
    $('#eventmodal').modal('show');

    }
    </script>
@endsection
