<?php


namespace App\Builder\Filters;


use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SearchTagField implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas('tag_models', function ($subQuery) use ($value) {
            if (is_array($value)) {
                $subQuery->whereIn('name', $value);
            }else{
                $subQuery->where('name', $value);
            }
        });
        return $query;
    }
}
