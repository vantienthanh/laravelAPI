<?php

namespace Modules\Color\Repositories\Cache;

use Modules\Color\Repositories\ColorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheColorDecorator extends BaseCacheDecorator implements ColorRepository
{
    public function __construct(ColorRepository $color)
    {
        parent::__construct();
        $this->entityName = 'color.colors';
        $this->repository = $color;
    }
}
