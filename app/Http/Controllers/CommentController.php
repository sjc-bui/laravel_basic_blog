<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    /**
     * Store new comment in storage.
     * 
     */
    public function store(Post $post) {
        $this->validate(request(), [
            'new_comment' => 'required|min:3|max:255'
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request()->new_comment
        ]);

        // redirect to the previous URL
        return redirect()->back();
    }
}
