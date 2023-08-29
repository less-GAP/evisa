<?php


namespace App\Traits;


trait HasVatFee
{
    public static function bootHasVatFee()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
                $model->vat_fee = number_format($model->total_amount/10,2);
        });

        // updating updated_by when model is updated
//        static::updating(function ($model) {
//            if (!$model->isDirty($model->slugBy)) {
//                $model->slug = \Str::slug($model->{$model->slugBy});
//            }
//        });
    }
}
