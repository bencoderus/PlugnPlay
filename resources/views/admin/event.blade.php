@extends('layouts.admin')

@section('content')
<div class="card shadow">
    <div class="card-body">
    <span class="h3">
EVENTS
</span>
<span class="float-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i>
              </button>
</span>
<hr>
    </div>
</div>


<!--Event modal-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">ADD EVENT</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form id="eventform">
       @csrf
                <div class="form-group">
        <label for="title">Event Title</label>
        <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="form-group">
        <label for="location">Event Location</label>
        <input type="text" name="location" class="form-control" id="location" required>
        </div>

        <div class="form-group">
                <label for="title">Event Description</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                </div>

        <div class="form-group">
                <div class="row">
                        <div class="col-8">
                                <label for="title">Event Date</label>
                                <input type="date" name="date" class="form-control" id="date" required>

                        </div>
                        <div class="col-4">
                                <label for="title">Event Time</label>
                                <input type="time" name="time" class="form-control" id="time" required>

                            </div>
                    </div>
                </div>

                <div class="form-group">

                        <label for="image">Event Image</label>
                    <input type="file" name="image" id="image" required>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="submit" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
        </div>
      </div>
<!--end event modal-->


@push('script')
<script>
$("#eventform").submit(function(e){
e.preventDefault();
var eventdata =  $("#eventform").serialize();
$.ajax({
type: 'Post',
url: '{{url(route('addevent'))}}',
data: eventdata,
contentType: false,
processData: false,
success: function(){
},
error: function(){

}
})
})
</script>

@endpush

@endsection