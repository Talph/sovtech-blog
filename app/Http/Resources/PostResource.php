<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'author' => UserResource::collection($this->getRelatedUser()),
            'title' => ucfirst($this->title),
            'subtitle' => ucfirst($this->subtitle),
            'metaDesc' => $this->meta_desc,
            'seoKeywords' => $this->seo_keywords,
            'content' => $this->content,
            'postedAt' => Carbon::parse($this->posted_at)->toDateString(),
            'slug' => '/posts/' . $this->slug,
            'isPublished' => $this->isPublished() ? 'Published' : 'Draft',
            'images' => '/img/png/graduate.webp',
            'relatedCategories' => CategoryResource::collection($this->getRelatedCategories())
        ];
    }
}
