@extends('layouts.admin')



@section('content')
<div class="card">
    <div class="card-body">        @foreach($users as $user)
{{$user->name}}
<button type="submit" onclick="edituser({{$user}})" class="btn btn-sm btn-primary">Edit</button>
        @endforeach
    </div>
</div>


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
              <div class="form-group">
                  <input type="text" id="name" class="form-control">
              </div>
              <div class="form-group">
                    <input type="text" id="email" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

@push('script')
<script>
function edituser(user){
    $('#modaltitle').text("Edit " +user.name)
    $('#name').val(user.name)
    $('#email').val(user.email)
    $('#editmodal').modal('show')

}

</script>


@endpush

@endsection
