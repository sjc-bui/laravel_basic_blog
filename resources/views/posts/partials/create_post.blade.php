<form action="{{ route('posts.store') }}" method="post">
    @csrf

    {{-- post title --}}
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="title..." required value="{{ old('title') }}">
        @if ($errors->has('title'))
            <small class="text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>

    {{-- post body --}}
    <div class="form-group">
        <label for="body">Post body</label>
        <textarea name="body" id="body" rows="3" class="form-control" required style="resize: none;" placeholder="body...">{{ old('body') }}</textarea>
        @if ($errors->has('body'))
            <small class="text-danger">{{ $errors->first('body') }}</small>
        @endif
    </div>

    <div class="form-group">
        <label for="tags">Post tags</label>
        <input type="text" name="tags" id="tags" class="form-control" placeholder="tag1, tag2, tag3" required value="{{ old('tags') }}">
        @if ($errors->has('tags'))
            <small class="text-danger">{{ $errors->first('tags') }}</small>
        @endif
    </div>

    {{-- submit button --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save post</button>
        <a href="{{ route('home') }}" class="btn btn-default">Back</a>
    </div>
</form>
