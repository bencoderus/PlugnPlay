@extends('layouts.admin')
@php
$start = 2010;
$end = date('Y');
@endphp

@section('title')
Music
@endsection

@section('content')
{{-- <event>
</event> --}}
<div class="card shadow">
<div class="card-body">
<span class="h3">
MUSIC
</span>
<span class="float-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventmodal">
<i class="fa fa-plus"></i>
</button>
</span>
<br><br>
@if(count($musics) > 0)
<div class="table-responsive">
<table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Song Title</th>
            <th scope="col">Album</th>
            <th scope="col">Artist</th>
            <th scope="col">Year</th>
            <th scope="col">Play</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($musics as $music)
          <tr>
            <th scope="row">{{$music->id}}</th>
            <td>{{$music->title}}</td>
            <td>{{($music->album_id == 0) ? "Single" : $music->album->name}}</td>
          <td>{{$music->artist}}</td>
          <td>{{$music->year}}</td>
        <td>
                        <audio controls>
                        <source src="{{asset('songs/'.$music->song)}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>

        </td>
          <td>
              <button onclick="editmusic({{$music}})" class="btn btn-sm btn-primary">Edit</button>
                <button onclick="deletemusic({{$music->id}})" class="btn btn-danger btn-sm">
                     Delete
                            </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      @else
<p class="h3">NO MUSIC ADDED YET!</p>
      @endif
</div>
</div>


<!--Edit Music Modal-->



<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modaltitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div id="msgs" class="msgs">

                        </div>
                        <form id="editform">
                        @csrf
                        <div class="form-group">
                        <label for="title">Song Title</label>
                        <input type="text" name="title" class="form-control" id="edittitle" required>
                        </div>
                        <div class="form-group">
                        <label for="title">Song Description</label>
                        <textarea name="content" id="editcontent" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                    <label for="title">Song Year</label>
                                    <select name="year" id="edityear" class="form-control" required>
                                    @for($a= $start; $a <= $end; $a++)
                                        <option value="{{$a}}">{{$a}}</option>
                                    @endfor
                                    </select>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="title">Select album</label>
                                            <select name="album" id="editalbum" class="form-control">
                                            <option value="0">Select Album</option>
                                            @foreach($albums as $album)
                                                <option value="{{$album->id}}">{{$album->name}}</option>
                                            @endforeach
                                            </select>
                                            <p><small class="text-muted">Leave blank if its' a single</small></p>
                                            </div>

                                </div>
                        </div>



                        <div class="form-group">

                        <label for="image">Change album art</label>
                        <input type="file" name="image" id="editimage">
                        <img src="#" alt="preview" id="previewedit" style="width: 20%;">
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="image">Change music file</label>
                            <input type="file" name="song" id="editsong">
                            <p><small class="text-muted">You can only add <b>.mp3</b> files</small></p>

                        </div>


                    </div>
                        </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="editid">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
            </div>
          </div>
        </div>
      </div>



<!--Music modal-->
<div class="modal fade" id="eventmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">ADD MUSIC</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div id="msgs" class="msgs">
</div>
<form id="eventform">
@csrf
<div class="form-group">
<label for="title">Song Title</label>
<input type="text" name="title" class="form-control" id="title" required>
</div>
<div class="form-group">
<label for="title">Song Description</label>
<textarea name="content" id="content" class="form-control" rows="5" required></textarea>
</div>

<div class="form-group">
<div class="row">
    <div class="col-md-6">
            <label for="title">Song Year</label>
            <select name="year" id="year" class="form-control" required>
            @for($a= $start; $a <= $end; $a++)
                <option value="{{$a}}">{{$a}}</option>
            @endfor
            </select>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                    <label for="title">Select Album</label>
                    <select name="album" id="album" class="form-control">
                    <option value="0">Select Album</option>
                    @foreach($albums as $album)
                        <option value="{{$album->id}}">{{$album->name}}</option>
                    @endforeach
                    </select>
                    <p><small class="text-muted">Leave blank if its' a single</small></p>
                    </div>

        </div>
</div>



<div class="form-group">

<label for="image">Song Image</label>
<input type="file" name="image" id="image" required>
<img src="#" alt="preview" id="previewimg" style="width: 20%;">
</div>

<hr>
<div class="form-group">
    <label for="image">Music File</label>
    <input type="file" name="song" id="song" required>
    <p><small class="text-muted">You can only add <b>.mp3</b> files</small></p>

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
function editmusic(music)
{
    $('#modaltitle').text('Edit ' +music.title)
    $('#editmodal').modal('show')
    $('#edittitle').val(music.title)
    $('#editcontent').val(music.content)
    $('#edityear').val(music.year)
    $('#editalbum').val(music.album_id)
    $('#edittitle').val(music.title)
    $('#editid').val(music.id)

    //Passing the image from db to preview
    $("#previewedit").attr('src', "/images/albumart/" +music.image)




$('#editform').submit(function(e){
    e.preventDefault();
    $("#msgs").html("");
    $("#loading").show()
        var form = $("#editform")[0];
		var _data = new FormData(form);
		$.ajax({
			url: '{{url(route("editmusic"))}}',
			data: _data,
			enctype: 'multipart/form-data',
			processData: false,
			contentType:false,
			type: 'POST',
			success: function(data){
                $("#loading").hide()
                toastr.success("Changes Saved!");
                $('#editform').trigger('reset');
                $('#editmodal').modal('hide')
                setTimeout(()=>{
                    location.reload();
                }, 1000)
            },
			error: function(result){
                $("#loading").hide()
let errors = result.responseJSON.errors;
console.log(errors);
$.each(errors, function(key, value){
let msgs = "<div class='alert alert-danger'>" +value +"</div>";
$('#msgs').append(msgs);
})
   toastr.error('Network Error', 'An error occured!');
			}
		});
    });

}



function readURL(input, image) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function(e) {
    image.attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}

$("#image").change(function() {
let preview = $("#previewimg")
    readURL(this, preview);
});

$("#editimage").change(function() {
let preview = $("#previewedit")
    readURL(this, preview);
});

$('#eventform').submit(function(e){
    e.preventDefault();
    $("#msgs").html("");
    $("#loading").show()
        var form = $("#eventform")[0];
		var _data = new FormData(form);
		$.ajax({
			url: '{{url(route("addmusic"))}}',
			data: _data,
			enctype: 'multipart/form-data',
			processData: false,
			contentType:false,
			type: 'POST',
			success: function(data){
                $("#loading").hide()
                toastr.success("New Music added!");
                $('#eventform').trigger('reset');
                $('#eventmodal').modal('hide')
                setTimeout(()=>{
                    location.reload();
                }, 1000)
            },
			error: function(result){
                $("#loading").hide()
let errors = result.responseJSON.errors;
console.log(errors);
$.each(errors, function(key, value){
let msgs = "<div class='alert alert-danger'>" +value +"</div>";
$('#msgs').append(msgs);
})
   toastr.error('Unable to add music', 'An error occured!');
			}
		});
    });


    //Delete Music
    function deletemusic(id){
if(confirm("Are you sure you want to delete this song?")){
    $("#loading").show()
axios.post('{{route('deletemusic')}}', {
    id: id
}).then((response)=>{
    $("#loading").hide()
toastr.success('Music Deleted!')
location.reload();
}).catch((error)=>{
    $("#loading").hide()
    toastr.error('Network Error!')
})
}
}
</script>

@endpush

@endsection
