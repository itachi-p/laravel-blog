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
@endsection