<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PATCH')

    {{-- post title --}}
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="title..." required
        value="{{ $post->title }}">
        @if ($errors->has('title'))
            <small class="text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>

    {{-- post body --}}
    <div class="form-group">
        <label for="body">Post body</label>
        <textarea name="body" id="body" rows="3" class="form-control" required style="resize: none;" placeholder="body...">{{ $post->body }}</textarea>
        @if ($errors->has('body'))
            <small class="text-danger">{{ $errors->first('body') }}</small>
        @endif
    </div>

    {{-- submit button --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update post</button>
        <a href="{{ route('home') }}" class="btn btn-default">Back</a>
    </div>
</form>
