<?php

namespace App\Services;

use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use App\Rating;
use App\Repositories\CategoryRepository;
use App\Repositories\ModelRepository;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use const DIRECTORY_SEPARATOR;
use function storage_path;
use function substr;

/**
 * Class UserService
 * @package App\Services
 */
class CategoryService extends ModelService
{

    function __construct(CategoryRepository $modelRepository)
    {
        parent::__construct($modelRepository);
    }


    /**
     * @return Collection
     */
    public function tree(): Collection
    {
        return $this->modelRepository->tree();
    }

}

