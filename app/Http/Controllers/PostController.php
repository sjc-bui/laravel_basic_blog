<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Show form for creating a new post.
     */
    public function create() {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a new post in storage.
     * 
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'body'  => 'required|min:3|max:300',
            'tags'  => 'required|min:3|max:50',
            'category_id' => 'required|integer'
        ]);

        // store data using create() method.
        $tag = explode(', ', $request->tags);
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
            'tags' => $request->tags,
            'category_id' => $request->category_id
        ]);
        $post->tag($tag);

        // redirect to show post url.
        return redirect($post->path());
    }

    /**
     * Display the specified resource
     * 
     */
    public function show(Post $post) {
        $prev = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        return view('posts.show')
                ->with([
                    'post' => $post,
                    'prev' => $prev,
                    'next' => $next
                ]);
    }

    /**
     * Show form for editing the specified resource
     * 
     */
    public function edit(Post $post) {
        $categories = Category::all();
        return view('posts.edit')->with([
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update post in storage.
     * 
     */
    public function update(Request $request, Post $post) {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'body'  => 'required|min:3|max:300',
            'category_id' => 'required|integer'
        ]);

        $post->update([
            'title' => $request->title,
            'body'  => $request->body,
            'category_id' => $request->category_id
        ]);

        return redirect($post->path());
    }

    public function destroy(Post $post) {}
}
