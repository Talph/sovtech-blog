<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::query()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return CategoryResource
     */
    public function create(): CategoryResource
    {
        return new CategoryResource(Category::query()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @param CategoryService $postService
     * @return CategoryResource
     */
    public function store(StoreCategoryRequest $request, CategoryService $postService): CategoryResource
    {
        $post = $postService->create(new Category, $request);

        return new CategoryResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $post
     * @return CategoryResource
     */
    public function show(Category $post): CategoryResource
    {
        return new CategoryResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $post
     * @return CategoryResource
     */
    public function edit(Category $post): CategoryResource
    {
        return new CategoryResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CategoryService $postService
     * @param int $id
     * @return CategoryResource
     */
    public function update(Request $request, CategoryService $postService, int $id): CategoryResource
    {
        $post = $postService->create(Category::findOrFail($id), $request);

        return new CategoryResource($post);
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
