<?
namespace App\Http\Controllers;

use App\Category;
use App\Services\CategoryService;

class CategoryItemsController extends RestRelationController {

    function __construct(CategoryService $modelService, $attaches = 'items')
    {
        parent::__construct($modelService, $attaches);
    }
}