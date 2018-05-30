<?php

namespace App\Repositories;

use App\Http\Requests\CreateItem;
use App\Http\Requests\UpdateItem;
use App\Item;
use App\Services\ItemService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * Class ItemsRepository
 * @package App\Repositories
 */
class ItemsRepository extends ModelRepository
{
    /**
     * ItemsRepository constructor.
     * @param Item $modelClass
     */
    function __construct(Item $modelClass)
    {
        parent::__construct($modelClass);
    }


    /**
     * @param Model $model
     * @param Request $request
     * @return Model
     */
    public function fill(Model $model, Request $request)
    {
        $filename = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = ItemService::getUploadDir();
            $filename = md5(time()) . '.' . $image->getClientOriginalExtension();
            try {
                $image->move($destinationPath, $filename);
            } catch (FileException $e) {
                throw $e;
            }
        }

        if ($model->image) {
            File::delete(ItemService::getUploadDir() . DIRECTORY_SEPARATOR . $model->image);
        }

        $model->fill([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $filename
        ]);

        return $model;
    }

}

