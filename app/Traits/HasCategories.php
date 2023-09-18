<?php


namespace App\Traits;


use App\Models\Tag;
use App\Models\Taxonomy;
use Illuminate\Database\Eloquent\Builder;

trait HasCategories
{
    public function category_models()
    {
        return $this->belongsToMany(Taxonomy::class, 'taxonomy_model', 'class_key', 'taxonomy_id')->where('taxonomy_type', 'category')->where('class', static::class);

    }

    public function getCategoriesAttribute()
    {
        return $this->category_models()->pluck('id');

    }

    public function syncCategories($tags)
    {
        $data = [];
        foreach ($tags as $id){
            $data[$id] = [
                'class' => static::class
                ,'taxonomy_type' => 'category'
            ];
        }
        $this->category_models()->where('taxonomy_type', 'category')->sync($data);
    }


    public static function bootHasCategories()
    {
        // updating created_by and updated_by when model is created
        static::saved(function ($model) {
            if (request()->input('categories')) {
                $model->syncCategories(request()->input('categories'));
            }
        });

    }
}
