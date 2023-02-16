<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): Factory|View|Application
    {
        return view('frontend.categories.show', ['category' => new CategoryResource($category->with('relatedPosts'))]);
    }
}
