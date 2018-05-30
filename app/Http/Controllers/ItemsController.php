<?
namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateItem;
use App\Http\Requests\UpdateItem;
use App\Services\ItemService;
use App\Services\ModelService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemsController extends Controller {

    /**
     * @var ModelService
     */
    protected $modelService;

    function __construct(ItemService $modelService)
    {
        $this->modelService = $modelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return response()->json(['data' => $this->modelService->list()]);
    }


    public function store(CreateItem $request)
    {
        $model = $this->modelService->create($request);
        return response()->json(['data' => $model->toArray()])->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return array
     */
    public function show($id)
    {
        $model = $this->modelService->show($id);
        return response()->json(['data' => $model->toArray()])->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateItem $request, $id)
    {
        $model = $this->modelService->update($id, $request);
        return response()->json(['data' => $model->toArray()])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->modelService->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}