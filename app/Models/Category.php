<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function relatedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'posts_categories');
    }

    public function relatedUser(): HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function getRelatedUser(): Collection
    {
        return $this->relateduser()->get();
    }

    public function getRelatedPosts()
    {
        $this->relatedPosts()->get();
    }
}
