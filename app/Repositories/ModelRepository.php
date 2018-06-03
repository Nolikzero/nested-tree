<?
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class ModelRepository
 * @package App\Repositories
 */
abstract class ModelRepository
{

    /**
     * @var Model
     */
    protected $modelClass;

    /**
     * @var
     */
    protected $modelRequest;

    /**
     * ModelRepository constructor.
     * @param Model $modelClass
     */
    function __construct(Model $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        $model = $this->modelClass;
        return $model::all();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $model = $this->modelClass;
        return $model::findOrFail($id);
    }

    /**
     * @param array $request
     * @return Model
     * @throws \Exception
     */
    public function store(array $request): Model
    {
        try {
            $model = new $this->modelClass();
            $model = $this->fill($model, $request);
            $model->save();

        } catch (\Exception $e) {
            throw $e;
        }

        return $model;
    }

    /**
     * @param Model $model
     * @param array $request
     * @return Model
     * @throws \Exception
     */
    public function update(Model $model, array $request): Model
    {
        try {
            $model = $this->fill($model, $request);
            $model->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return $model;
    }

    /**
     * @param Model $model
     * @throws \Exception
     */
    public function destroy(Model $model)
    {
        try {
            $model->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $id
     * @param $attaches
     * @return mixed
     */
    public function relation($id, $attaches)
    {
        return $this->show($id)->{$attaches}()->get();
    }

    /**
     * @param Model $model
     * @param array $request
     * @return Model
     */
    public function fill(Model $model, array $request)
    {
        $model->fill($request);
        return $model;
    }
}