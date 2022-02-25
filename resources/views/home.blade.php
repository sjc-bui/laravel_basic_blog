@extends('layouts.app')

@section('content')

<div class="clearfix">
    <h2 class="float-left">List</h2>

    {{-- create new post --}}
    <a href="{{ route('posts.create') }}" class="btn btn-link float-right">
        Create new post
    </a>
</div>

{{-- All posts --}}
@forelse ($posts as $post)
    <div class="card m-2 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            </h4>

            <p class="card-text">
                {{-- post owner --}}
                <small class="float-left">By: {{ $post->owner->name }}</small>

                {{-- create time --}}
                <small class="float-right text-muted">
                    {{ $post->created_at->format('M d, Y h:i A') }}
                </small>

                @if (auth()->id() == $post->owner->id)
                    {{-- link to edit this post --}}
                    <small class="float-right mr-2 ml-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="float-right">Edit</a>
                    </small>
                @endif
            </p>
        </div>
    </div>
@empty
    <p>No posts yet.</p>
@endforelse

@endsection
