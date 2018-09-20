<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CreateCategoryRequest;
use Modules\Category\Http\Requests\UpdateCategoryRequest;
use Modules\Category\Repositories\CategoryRepository;
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
        return $this->response->array([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    public function show( $id) {
        $categories = $this->category->find($id);
        return $categories;
    }

    public function store() {

    }

    public function update($id, UpdateCategoryRequest $request) {
        $category = $this->category->find($id);
        $category = $this->category->update($category, $request->all());
        return $this->response->array(['status' => 'success', 'data' => $category]);
    }
//qweqwe
    public function destroy($id) {
         $this->category->destroy($id);
    }
}