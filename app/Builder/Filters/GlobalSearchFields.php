<?php


namespace App\Builder\Filters;


use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class GlobalSearchFields implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $fields = explode(',', $property);

        foreach ($fields as $field) {
            $query = $query->orWhere($field, 'like', '%'.$value.'%');
        }

        return $query;
    }
}
