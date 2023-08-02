<?php


namespace App\Builder;


use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;

class EloquentRouter
{
    private $prefix;

    public function __construct(private $model, private $config)
    {

    }

    public function getList(Request $request)
    {
        $query = $this->model::query();
        if ($search = $request->input('search')) {
            $query->where('email_title', 'like', '%' . $search . '%');
        }
        return QueryBuilder::for($this->model)
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
        return $query->first();
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

    public function handle($prefix)
    {
        $this->prefix = $prefix;

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
    public function addRoute($callback)
    {
        Route::prefix($this->prefix)->group($callback);
    }
}
