<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Modules\Category\Http\Requests\UpdateCategoryRequest;
use Modules\Category\Http\Requests\CreateCategoryRequest;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Category\Transformers\CategoryTransformers;
class CategoryController extends BaseController
{
    private $category;
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return $this->response->collection($categories, new CategoryTransformers);
    }

    public function show( $id) {
        $categories = $this->category->find($id);
        return $this->response->item($categories, new CategoryTransformers);
    }


    public function store(CreateCategoryRequest $request) {
        $this->category->create($request->all());
    }

    public function update($id, UpdateCategoryRequest $request) {
        $category = $this->category->find($id);
        $category = $this->category->update($category, $request->all());
        return $this->response->item($category, new CategoryTransformers);
    }
    public function destroy($id) {
         $this->category->destroy($id);
    }
}