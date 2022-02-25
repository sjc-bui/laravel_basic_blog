<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['user_id', 'post_id', 'body'];

    // Relations

    // One to many inverse relation with User model
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // One to many inverse relation with Post model
    public function post() {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // One to many relation with Reply model
    public function replies() {
        return $this->hasMany(Reply::class, 'comment_id');
    }
}
