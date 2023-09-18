<?php


namespace App\Traits;


use App\Models\Tag;
use App\Models\Taxonomy;
use Illuminate\Database\Eloquent\Builder;

trait HasTags
{
    public function tag_models()
    {
        return $this->belongsToMany(Taxonomy::class, 'taxonomy_model', 'class_key', 'taxonomy_id')->where('taxonomy_type', 'tag')->where('class', static::class);
    }

    public function getTagsAttribute()
    {
        return $this->tag_models()->pluck('id');
    }

    public function syncTags($tags)
    {
        $data = [];
        foreach ($tags as $id){
            $data[$id] = [
                'class' => static::class
                ,'taxonomy_type' => 'tag'
            ];
        }
        $this->tag_models()->where('taxonomy_type', 'tag')->sync($data);

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
