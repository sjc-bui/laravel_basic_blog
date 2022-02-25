<form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-2 mb-4">
    @csrf
    <div class="input-group">
        <input type="text" name="new_comment" class="form-control" placeholder="write your comment.." required>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Add comment</button>
        </div>
    </div>
</form>
