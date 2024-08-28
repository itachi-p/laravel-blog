@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @forelse ($all_posts as $post)
        <div class="mt-2 border border-2 rounded py-4 px-4">
            <a href="{{ route('post.show', $post->id) }}">
                <h2 class="h6">{{ $post->title }}</h2>
            </a>
            <h3 class="h6 text-muted">{{ $post->user->name }}</h3>
            <p class="fw-light mb-0">{{ $post->body }}</p>

            {{-- Action Buttons --}}
            @if ( Auth::user()->id === $post->user->id) {{-- $post->user_id is also Ok.--}}
                <div class="mt-2 text-end">
                    {{-- edit --}}
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a>

                    {{-- delete --}}
                    <form action="{{ route('post.destroy', $post->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @empty
        <div class="mt-5">
            <h2 class="text-muted text-center">No posts yet.</h2>
            <p class="text-center">
                <a href="{{ route('post.create') }}" class="text-decoration-none">Create a new post</a>
            </p>
        </div>
    @endforelse
@endsection