<?php


namespace App\Traits;


use App\Models\Tag;
use App\Models\Taxonomy;
use Illuminate\Database\Eloquent\Builder;

trait HasTags
{
    public function tag_models()
    {
        return $this->hasMany(Taxonomy::class, 'class_key')->where('type','tag')->where('class', static::class);
    }

    public function getTagsAttribute()
    {
        return $this->tag_models()->pluck('name');
    }

    public function syncTags($tags)
    {
        $this->tag_models()->delete();
        foreach ($tags as $tag) {
            Taxonomy::create([
                'name' => \Str::slug($tag)
                , 'type' => 'tag'
                , 'class_key' => $this->getKey()
                , 'class' => static::class
            ]);
        }

    }


    public static function bootHasTags()
    {
        // updating created_by and updated_by when model is created
        static::saved(function ($model) {
            if (request()->input('tags')) {
                $model->syncTags(request()->input('tags'));
            }
        });

    }
}
