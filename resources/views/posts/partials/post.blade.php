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
        <small class="text-muted">
            @if (isset($prev))
                Previous: <a href="{{ route('posts.show', $prev->id) }}">{{ $prev->title }}</a>
            @endif
            @if (isset($next))
                Next: <a href="{{ route('posts.show', $next->id) }}">{{ $next->title }}</a>
            @endif
        </small>
        <hr>
        {{-- post comments --}}
        @include('posts.partials.comments')
    </div>
</div>
