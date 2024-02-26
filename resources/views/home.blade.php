@extends('layouts.app')


@section('title', 'Home Page')


@section('content')
<div class="container">
    <h1>Welcome to the Photo Gallery</h1>
    <div class="row">
        @forelse($photos as $photo)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ $photo->url }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body">
                        <p class="card-text">{{ $photo->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No photos to display.</p>
        @endforelse
    </div>
</div>
@endsection
