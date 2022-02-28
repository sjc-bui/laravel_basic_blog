@extends('layouts.app')

@section('content')

<div class="clearfix">
    <h2 class="float-left">List</h2>

    {{-- create new post --}}
    <a href="{{ route('posts.create') }}" class="btn btn-link float-right">
        New post
    </a>
    <a href="{{ route('categories.home') }}" class="btn btn-link float-right">
        Categories
    </a>
</div>

{{-- All posts --}}
@forelse ($posts as $post)
    <div class="card m-2 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            </h4>
            <div class="post-tags mb-1">
                @foreach($post->tags as $tag)
                    <span class="badge badge-info">{{$tag->name}}</span>
                @endforeach
            </div>
            @if (isset($post->category))
                <small class="text-muted">
                    <a href="#">{{ $post->category->name }}</a>
                </small>
            @endif

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
