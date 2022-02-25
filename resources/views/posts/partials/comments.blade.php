<h4 class="card-title">Comments</h4>

{{-- Comment form --}}
@include('posts.partials.add_comment')

{{-- list all comments --}}
@forelse ($post->comments as $comment)
    <div class="card-text">
        <b>{{ $comment->owner->name }}</b> said
        <small class="text-muted">
            {{ $comment->created_at->diffForHumans() }}
        </small>
        <p>{{ $comment->body }}</p>

        {{-- reply form --}}
        @include('posts.partials.add_reply')

        {{-- list all replies --}}
        @include('posts.partials.replies')
    </div>
    {{-- hr tag at the end of reply --}}
    {!! $loop->last ? '' : '<hr>' !!}
@empty
    <p class="card-text">No comments yet!</p>
@endforelse
