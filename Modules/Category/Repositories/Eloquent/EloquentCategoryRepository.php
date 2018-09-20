<?php

namespace Modules\Category\Repositories\Eloquent;

use Modules\Category\Repositories\CategoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
    public function all($relations = [])
    {
        $query = $this->model->query();
        if (! empty($relations)) {
            $query->with($relations);
        }

        if (method_exists($this->model, 'translations')) {
            return $query->with('translations')->orderBy('created_at', 'DESC')->get();
        }

        return $query->orderBy('created_at', 'DESC')->get();
    }
}
