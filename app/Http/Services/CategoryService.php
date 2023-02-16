<?php

namespace App\Http\Services;

use App\Http\Traits\SlugTrait;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    use SlugTrait;
    public function create(Category|Builder $category, mixed $request): bool|Model|Builder
    {
        DB::transaction(function() use($category, $request) {
            return $category->query()->updateOrCreate([
                'id' => $category->id
            ], [
                'name' => $request->get('name'),
                'slug' => $this->slugify($category, $request->get('name'))
            ]);
        });

        return false;
    }
}
