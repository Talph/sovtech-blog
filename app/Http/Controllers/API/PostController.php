<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Http\Services\PostService;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::query()->where('is_published', 1)->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::query()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return AnonymousResourceCollection
     */
    public function create(): AnonymousResourceCollection
    {
       return CategoryResource::collection(Category::query()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @param PostService $postService
     * @return JsonResponse
     */
    public function store(Request $request, PostService $postService): JsonResponse
    {
        $postService->create(new Post, $request);

        return response()->json(['message' => 'Created a post successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return PostResource
     */
    public function edit(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PostService $postService
     * @param int $id
     * @return PostResource
     */
    public function update(Request $request, PostService $postService, int $id): PostResource
    {
        $post = $postService->create(Post::findOrFail($id), $request);

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {

        Post::query()->findOrFail($id)->delete();

        return response()->json([
            'message' => 'Post deleted successfully'
        ]);
    }
}
