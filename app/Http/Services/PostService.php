<?php

namespace App\Http\Services;

use App\Http\Traits\AttachModelTrait;
use App\Http\Traits\SlugTrait;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostService
{
    use SlugTrait, AttachModelTrait;

    public function create(Post $post, mixed $request): bool|Model|Builder
    {
        $stored = DB::transaction(function () use ($post, $request) {
            $post = $post->query()->updateOrCreate([
                'id' => $post->id
            ], [
                'user_id' => $request->get('user_id'),
                'title' => $request->get('title'),
                'subtitle' => $request->get('subtitle'),
                'meta_desc' => $request->get('meta_desc'),
                'seo_keywords' => $request->get('seo_keywords'),
                'content' => $request->get('content'),
                'posted_at' => $request->get('posted_at'),
                'is_published' => $request->get('is_published'),
                'slug' => $this->slugify($post, $request->get('title')),
            ]);
            if ($request->has('category_id')) {
                $this->attach($post, $request->get('category_id'), 'categories');
            }
        });


        return !$stored ? $post : false;
    }

}
