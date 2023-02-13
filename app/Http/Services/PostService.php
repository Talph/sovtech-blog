<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function create(Post $post, mixed $request): bool|Model|Builder
    {
        DB::transaction(function() use($post, $request){
            return $post->query()->updateOrCreate([
                'id' => $post->id
            ], [
                'title' => $request->get('title')
            ]);
        });

        return false;
    }

}
