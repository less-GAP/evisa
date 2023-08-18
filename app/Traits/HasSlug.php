<?php


namespace App\Traits;


trait HasSlug
{
    public static function bootHasSlug()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty($model->slugBy)) {
                $model->slug = \Str::slug($model->{$model->slugBy});
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty($model->slugBy)) {
                $model->slug = \Str::slug($model->{$model->slugBy});
            }
        });
    }
}
