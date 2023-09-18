<?php


namespace App\Traits;


use App\Models\Tag;
use App\Models\Taxonomy;
use Illuminate\Database\Eloquent\Builder;

trait HasCategories
{
    public function category_models()
    {
        return $this->hasMany(Taxonomy::class, 'class_key')->where('type','category')->where('class', static::class);
    }

    public function getCategoriesAttribute()
    {
        return $this->category_models()->pluck('name');
    }

    public function syncCategories($tags)
    {
        $this->category_models()->delete();
        foreach ($tags as $tag) {
            Taxonomy::create([
                'name' => \Str::slug($tag)
                , 'type' => 'category'
                , 'class_key' => $this->getKey()
                , 'class' => static::class
            ]);
        }

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
