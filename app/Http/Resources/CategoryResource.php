<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'numberOfPosts' => count($this->relatedPosts()->get()),
            'posts' => $this->relatedPosts()->where('is_published', 1)->get(),
            'slug' => '/categories/' . $this->slug,
            'createdAt' => $this->created_at
        ];
    }
}
