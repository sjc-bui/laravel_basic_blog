<form action="{{ route('replies.store', $comment->id) }}" method="POST" class=" mb-2">
    @csrf
    <div class="input-group">
        <input type="text" name="new_reply" class="form-control" placeholder="write your reply.." required>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Reply</button>
        </div>
    </div>
</form>
