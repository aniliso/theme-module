<?php

namespace Modules\Theme\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterThemeSidebar extends AbstractAdminSidebar
{
    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('theme::themes.title.theme'), function (Item $item) {
                $item->icon('fa fa-sliders');
                $item->weight(50);
                $item->authorize(
                    $this->auth->hasAccess('theme.slides.index')
                );
                $item->item(trans('theme::themes.title.slide'), function (Item $item) {
                    $item->icon('fa fa-slideshare');
                    $item->weight(0);
                    $item->route('admin.theme.slide.index');
                    $item->authorize(
                        $this->auth->hasAccess('theme.slides.index')
                    );
                });
            });
        });

        return $menu;
    }
}
