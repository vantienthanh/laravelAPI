<?php

namespace Modules\Category\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterCategorySidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('category::categories.title.categories'), function (Item $item) {
                $item->icon('fa fa-cog');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('category::categories.title.categories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.category.category.create');
                    $item->route('admin.category.category.index');
                    $item->authorize(
                        $this->auth->hasAccess('category.categories.index')
                    );
                });
                $item->item(trans('category::users.title.users'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
//                    $item->append('admin.category.users.create');
                    $item->route('admin.category.users.index');
                    $item->authorize(
                        $this->auth->hasAccess('category.users.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
