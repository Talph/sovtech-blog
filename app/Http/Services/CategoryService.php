<?php

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function create(Category $category, mixed $request): bool|Model|Builder
    {
        DB::transaction(function() use($category, $request) {
            return $category->query()->updateOrCreate([
                'id' => $category->id
            ], [
                'category_name' => $request->get('category_name')
            ]);
        });

        return false;
    }
}
