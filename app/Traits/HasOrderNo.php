<?php


namespace App\Traits;


trait HasOrderNo
{
    public static function bootHasOrderNo()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
                $model->order_no = uniqid();
        });

        // updating updated_by when model is updated
//        static::updating(function ($model) {
//            if (!$model->isDirty($model->slugBy)) {
//                $model->slug = \Str::slug($model->{$model->slugBy});
//            }
//        });
    }
}
