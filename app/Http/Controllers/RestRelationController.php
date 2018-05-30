<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class RestController
 */
abstract class RestRelationController extends Controller
{

    /**
     * @var ModelService
     */
    private $modelService;

    private $attaches;


    function __construct(ModelService $modelService, $attaches)
    {
        $this->modelService = $modelService;
        $this->attaches = $attaches;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index($id)
    {
        return response()->json(['data' => $this->modelService->relation($id, $this->attaches)]);
    }
}
