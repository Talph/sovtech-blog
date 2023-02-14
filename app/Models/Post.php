<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function relatedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function relatedCategories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'posts_categories');
    }

    public function getRelatedUser(): Collection
    {
        return $this->relatedUser()->get();
    }

    public function getRelatedCategories(): Collection
    {
        return $this->relatedCategories()->get();
    }

    public function isPublished()
    {
        return $this->is_published === 1;
    }
}
