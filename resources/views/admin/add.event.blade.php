@extends('layouts.admin')

@section('content')

<form>
<div class="form-group">
<label for="title">Event Title</label>
<input type="text" name="title" class="form-control" id="title">
</div>
<div class="form-group">
<label for="location">Event Location</label>
<input type="text" name="location" class="form-control" id="location">
</div>

<div class="form-group">
        <label for="title">Event Description</label>
        <textarea name="content" id="content" class="form-control" rows="5"></textarea>
        </div>

<div class="form-group">
        <label for="title">Event Date</label>
        <input type="date" name="date" class="form-control" id="date">
        </div>

        <div class="form-group">
                <label for="image">Event Image</label>
            <input type="file" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus">Add Event</i>
        </button>
</form>

@endsection
