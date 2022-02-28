<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Post extends Model
{
    use HasFactory;
    use Taggable;

    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'body', 'tags'];

    /** Relations */
    // One to many inverse relationship with User model
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // One to many relationship with Comment model
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id');
    }

    /**
     * show post route
     * 
     * @return string
     */
    public function path() {
        return "/posts/{$this->id}";
    }
}
