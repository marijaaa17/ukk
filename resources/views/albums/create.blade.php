@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Add New Album</h2>
    <form method="POST" action="{{ route('albums.store') }}"> // ada disini error nya 
        @csrf
        <div class="form-group">
            <label for="nama_album">Album Name</label>
            <input type="text" class="form-control" id="nama_album" name="nama_album" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
