@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="mt-5">
        <h2 class="text-muted text-center">No posts yet.</h2>
        <p class="text-center">
            <a href="{{ route('post.create') }}" class="text-decoration-none">Create a new post</a>
        </p>
    </div>
@endsection