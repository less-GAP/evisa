<?php


namespace App\Builder;


use App\Models\EmailTemplate;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;

class EloquentRouter
{
    private $model;
    private $config;

    public function __construct(private $prefix)
    {
    }

    public static function prefix(string $prefix)
    {
        $handler = new static($prefix);
        return $handler;
    }

    public function routes($routes = null)
    {
        Route::prefix($this->prefix)->group($routes);
        return $this;
    }

    public function handle($model, array $config)
    {
        $this->model = new $model;
        $this->config = $config;
        $prefix = $this->prefix;

        Route::prefix($prefix)->group(function () {

            Route::get('list', function (Request $request) {
                return $this->getList($request);
            });
            Route::post('', function (Request $request) {
                return $this->updateOrCreate($request);
            });
            Route::get('{id}', function (Request $request) {
                return $this->getDetail($request);
            });
            Route::delete('{id}', function (Request $request) {
                return $this->delete($request);
            });
        });
        return $this;
    }

    public function getList(Request $request)
    {

        return QueryBuilder::for($this->model)
            ->defaultSort($this->config['defaultSort'] ?? '-id')
            ->allowedIncludes($this->config['allowedIncludes'] ?? [])
            ->allowedFilters($this->config['allowedFilters'] ?? [])
            ->allowedSorts($this->config['allowedSorts'] ?? 'id')
            ->paginate($request->input('perPage', 15))
            ->appends($request->query());
    }

    public function getDetail(Request $request)
    {
        $query = $this->model::query();
        if ($id = $request->route('id')) {
            $query->where('id', $id);
        }
        return $query->with($this->config['allowedIncludes']??[])->first();
    }

    public function delete(Request $request)
    {
        $query = $this->model::query();
        return [
            'result' => $query->find($request->route('id'))->delete(),
            'message' => 'Delete Successfully!'
        ];
    }

    public function updateOrCreate(Request $request)
    {
        $data = $request->all();
        $result = $this->model::updateOrCreate(['id' => $request->input('id')], $data);
        return [
            'result' => $result,
            'message' => $request->input('id') ? 'Update Successfully!' : 'Create Successfully!'
        ];
    }

    public function addRoute($callback)
    {
        Route::prefix($this->prefix)->group($callback);
    }
}
