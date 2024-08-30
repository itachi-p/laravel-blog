@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="card">
        <div class="card-body">
    @forelse ($all_posts as $post)
    <div class="row align-items-center border border-2 rounded">
        <div class="col-4 mt-2  py-4 px-4">
            <a href="{{ route('post.show', $post->id) }}">
                <h2 class="h6">{{ $post->title }}</h2>
            </a>
            <h3 class="h6 text-muted">
                <a href="{{ route('profile.show', $post->user_id) }}" class="form-controll">
                {{ $post->user->name }}
                </a>
            </h3>
            <p class="fw-light mb-0">{{ $post->body }}</p>
        </div>
        <div class="col-4  mt-2 border border-2 rounded">
        {{-- image --}}
        <img src="{{ $post->image }}" alt="{{ $post->title}}" class="w-100 shadow rounded">

        </div>
            {{-- Action Buttons --}}
            <div class="col-4">
            @if ( Auth::user()->id === $post->user->id) {{-- $post->user_id is also Ok.--}}
                <div class="">
                    {{-- edit --}}
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a>

                    {{-- delete --}}
                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </button>

                    {{-- <form action="{{ route('post.destroy', $post->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeletePostId({{ $post->id }})">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </button>
                    </form> --}}
            </div>

            {{-- include modal here --}}
            @include('posts.modal.action')

            @endif
        </div>
    </div>
    @empty
        <div class="mt-5">
            <h2 class="text-muted text-center">No posts yet.</h2>
            <p class="text-center">
                <a href="{{ route('post.create') }}" class="text-decoration-none">Create a new post</a>
            </p>
        </div>
    @endforelse
        </div>
    </div>
@endsection
