@extends('layouts.admin')
@php
$start = 2010;
$end = date('Y');
@endphp

@section('content')
{{-- <event>
</event> --}}
<div class="card shadow">
<div class="card-body">
<span class="h3">
ALBUMS
</span>
<span class="float-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventmodal">
<i class="fa fa-plus"></i>
</button>
</span>
<br><br>
@if(count($albums) > 0)
<div class="table-responsive">
<table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Album Name</th>
            <th scope="col">Album Content</th>
            <th scope="col">Album Year</th>
            <th scope="col">Added</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
          <tr>
            <th scope="row">{{$album->id}}</th>
            <td>{{$album->name}}</td>
            <td>{{$album->content}}</td>
          <td>{{$album->year}}</td>
          <td>{{$album->created_at->diffForHumans()}}</td>
            <td>
                    <button onclick="deletealbum({{$album->id}})" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                                </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      @else
<p class="h3">NO ALBUM ADDED YET!</p>
      @endif
</div>
</div>


<!--Event modal-->
<div class="modal fade" id="eventmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">ADD ALBUM</h5>
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
<label for="title">Album Title</label>
<input type="text" name="name" class="form-control" id="name" required>
</div>
<div class="form-group">
<label for="title">Album Description</label>
<textarea name="content" id="content" class="form-control" rows="5" required></textarea>
</div>

<div class="form-group">
<label for="title">Album Year</label>
<select name="year" id="year" class="form-control">
@for($a= $start; $a <= $end; $a++)
    <option value="{{$a}}">{{$a}}</option>
@endfor
</select>

</div>

<div class="form-group">

<label for="image">Album art/image</label>
<input type="file" name="image" id="image" required>
<img src="#" alt="preview" id="previewimg" style="width: 20%;">
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
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function(e) {
$('#previewimg').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}

$("#image").change(function() {
readURL(this);
});

$('#eventform').submit(function(e){
$("#loading").show()
    e.preventDefault();
    $("#msgs").html("");
        var form = $("#eventform")[0];
		var _data = new FormData(form);
		$.ajax({
			url: '{{url(route("addalbum"))}}',
			data: _data,
			enctype: 'multipart/form-data',
			processData: false,
			contentType:false,
			type: 'POST',
			success: function(data){
                $("#loading").hide()
                toastr.success("New Event added");
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
   toastr.error('Unable to add album', 'An error occured!');
			}
		});
    });

function deletealbum(id){
if(confirm("Are you sure you want to delete this album?")){
axios.post('{{route('deletealbum')}}', {
    id: id
}).then((response)=>{
toastr.success('Album Deleted!')
location.reload();
}).catch((error)=>{
    toastr.error('Network Error!')
})
}
}

</script>

@endpush

@endsection
