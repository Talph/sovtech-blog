<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;

trait AttachModelTrait
{
    /**
     * @param Model $model
     * @param mixed $attachments
     * @param string $attachmentType
     * @return bool
     */
    public function attach(Model $model, array $attachments, string $attachmentType = ''): bool
    {
        if($attachments){
            match($attachmentType) {
                'categories' => $model->relatedCategories()->sync($attachments),
            };
        }

        return true;
    }
}
