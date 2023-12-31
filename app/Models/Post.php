<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content"
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function scopeMostRecent(Builder $query) : Builder {
        return $query->orderByDesc('created_at');
    }


}

class PostUSer {
    public Post $post;
    public User $user;
    public function __construct(Post $post, User $user) {
        $this->post = $post;
        $this->user = $user;
    }
}
