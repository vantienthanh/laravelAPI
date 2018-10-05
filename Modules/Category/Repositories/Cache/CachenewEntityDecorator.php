<?php

namespace Modules\Category\Repositories\Cache;

use Modules\Category\Repositories\newEntityRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachenewEntityDecorator extends BaseCacheDecorator implements newEntityRepository
{
    public function __construct(newEntityRepository $newentity)
    {
        parent::__construct();
        $this->entityName = 'category.newentities';
        $this->repository = $newentity;
    }
}
