<?php

namespace Modules\Category\Repositories\Cache;

use Modules\Category\Repositories\UsersRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheUsersDecorator extends BaseCacheDecorator implements UsersRepository
{
    public function __construct(UsersRepository $users)
    {
        parent::__construct();
        $this->entityName = 'category.users';
        $this->repository = $users;
    }
}
