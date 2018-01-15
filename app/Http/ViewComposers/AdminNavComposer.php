<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/27/2017
 * Time: 4:30 PM
 */
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\AdminMenu\Facade as AdminMenu;

class AdminNavComposer
{
    /**
     * Bind data to view.
     */
    public function compose(View $view)
    {
        $adminMenus = (array)AdminMenu::getMenuItems();
        $view->with('adminMenus', $adminMenus);
    }
}