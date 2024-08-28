@extends('layouts.app')

@section('title', 'Show Post')


@section('content')
    <div class="mt-2 border border-2 rounded p-4 shadow-sm">
        {{-- title --}}
        <h2 class="h4">{{ $post->title }}</h2>

        {{-- owner --}}
        <h3 class="h6 text-muted">{{ $post->user->name }}</h3>

        {{-- body --}}
        <p>{{ $post->body }}</p>

        {{-- image --}}
        <img src="{{ $post->image }}" alt="{{ $post->title}}" class="w-100 shadow rounded">
    </div>

    {{-- comment form --}}
    <form action="#" method="post">
        @csrf
        <div class="input-group mt-5">
            <input type="text" name="comment" id="comment" placeholder="Add a comment..." value="{{ old('comment') }}" class="form-control">
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
        {{-- error --}}
        @error('comment')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </form>
@endsection