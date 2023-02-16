<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait SlugTrait {

    public function slugify(Model $model, string $string): string|null
    {
        $slug = Str::slug(strtolower($string));
        $count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
