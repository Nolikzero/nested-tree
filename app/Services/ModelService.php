<?
namespace App\Services;

use App\Repositories\ModelRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class ModelService
 * @package App\Services
 */
abstract class ModelService
{

    /**
     * @var ModelRepository
     */
    protected $modelRepository;

    /**
     * ModelService constructor.
     * @param ModelRepository $modelRepository
     */
    function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }


    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->modelRepository->index();
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function create(Request $request): Model
    {
        return $this->modelRepository->store($request);
    }

    /**
     * @param $id
     * @param Request $request
     * @return Model
     */
    public function update($id, Request $request): Model
    {
        $model = $this->modelRepository->show($id);
        return $this->modelRepository->update($model, $request);
    }

    /**
     * @param $id
     * @return Model
     */
    public function show($id): Model
    {
        return $this->modelRepository->show($id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $model = $this->modelRepository->show($id);
        $this->modelRepository->destroy($model);
    }

    /**
     * @param $id
     * @param $attaches
     * @return mixed
     */
    public function relation($id, $attaches){
        return $this->modelRepository->relation($id, $attaches);
    }
}