<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function relatedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'blog_posts_blog_categories');
    }

    public function relatedUser()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function getRelatedUser()
    {
        return $this->relateduser()->get();
    }

    public function getRelatedPosts()
    {
        $this->relatedPosts()->get();
    }
}
