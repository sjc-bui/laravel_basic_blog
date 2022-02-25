<div class="card shadow">
    <div class="card-body">
        {{-- post title --}}
        <h4 class="card-title">
            {{ $post->title }}
        </h4>

        {{-- owner name and created date --}}
        <small class="text-muted">
            Posted by: <b>{{ $post->owner->name }}</b> on {{ $post->created_at->format('M d, Y H:i:s') }}
        </small>

        {{-- post body --}}
        <p class="card-text">
            {{ $post->body }}
        </p>

        <hr>
        {{-- post comments --}}
        @include('posts.partials.comments')
    </div>
</div>
