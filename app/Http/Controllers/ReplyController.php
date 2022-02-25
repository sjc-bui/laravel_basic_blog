<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;

class ReplyController extends Controller
{
    //
    /**
     * Store new reply in storage.
     * 
     */
    public function store(Comment $comment) {
        $this->validate(request(), [
            'new_reply' => 'required|min:3|max:255'
        ]);

        $comment->replies()->create([
            'user_id' => auth()->id(),
            'body' => request()->new_reply
        ]);

        // redirect to the previous URL
        return redirect()->back();
    }
}
