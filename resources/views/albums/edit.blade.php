@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Edit Album</h2>
    <form method="POST" action="{{ route('albums.update', $album->album_id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_album">Album Name</label>
            <input type="text" class="form-control" id="nama_album" name="nama_album" value="{{ $album->nama_album }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $album->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
