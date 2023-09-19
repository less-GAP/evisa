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
        $type = 'tag';
        $data = [];
        foreach ($tags as $id) {
            $data[] = [
                'class' => static::class
                , 'taxonomy_type' => $type
                , 'taxonomy_id' => $id
                , 'class_key' => $this->getKey()
            ];
        }
        \DB::table('taxonomy_model')->where([
            'class' => static::class
            , 'taxonomy_type' => $type
            , 'class_key' => $this->getKey()
        ])->whereNotIn('taxonomy_id',$tags)->delete();
        \DB::table('taxonomy_model')->insertOrIgnore($data);

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
