<?php

namespace App\Repositories;

use App\Category;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class RatingRepository
 * @package App\Repositories
 */
class CategoryRepository extends ModelRepository
{
    function __construct(Category $modelClass)
    {
        parent::__construct($modelClass);
    }

    /**
     * @return Collection
     */
    public function tree():Collection {
        return Category::get()->toHierarchy();
    }

}

