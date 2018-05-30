<?php

namespace App\Services;

use App\Rating;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemsRepository;
use App\Repositories\ModelRepository;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\URL;
use const DIRECTORY_SEPARATOR;

/**
 * Class UserService
 * @package App\Services
 */
class ItemService extends ModelService
{
   function __construct(ItemsRepository $modelRepository)
   {
       parent::__construct($modelRepository);
   }


    /**
     * @return string
     */
    public static function getUploadDir(): string
    {
        return public_path() . DIRECTORY_SEPARATOR . 'upload';
    }

    /**
     * @return string
     */
    public static function getUploadUrl(): string
    {
        return URL::asset(DIRECTORY_SEPARATOR . 'upload');
    }
}

