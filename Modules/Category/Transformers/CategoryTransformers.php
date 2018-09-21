<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/21/2018
 * Time: 11:09 AM
 */

namespace Modules\Category\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Category\Entities\Category;
class CategoryTransformers extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'type' => $category->type,
            "parent_id" => $category->parent_id,
            "created_at" => $category->created_at,
            "updated_at" => $category->updated_at,
            "test" => 0
        ];
    }
}



