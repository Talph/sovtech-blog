<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('dashboard.categories.index', [
            'categories' => CategoryResource::collection(Category::query()->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('dashboard.categories.index', [
            'categories' => CategoryResource::collection(Category::query()->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @param CategoryService $categoryService
     * @return CategoryResource
     */
    public function store(StoreCategoryRequest $request, CategoryService $categoryService): CategoryResource
    {
        $category = $categoryService->create(new Category, $request);

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): Application|Factory|View
    {
        return view('dashboard.categories.edit', [
            'category' => new CategoryResource($category)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CategoryService $categoryService
     * @param int $id
     * @return CategoryResource
     */
    public function update(Request $request, CategoryService $categoryService, int $id): CategoryResource
    {
        $category = $categoryService->create(Category::findOrFail($id), $request);

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {

        Category::query()->findOrFail($id)->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
