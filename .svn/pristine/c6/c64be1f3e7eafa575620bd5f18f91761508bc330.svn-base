<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 06-Dec-17
 * Time: 11:23
 */

namespace App\Http\ViewComposers;


use App\Models\Database\Category;
use Illuminate\View\View;

class CategoryFieldsComposer
{
    public function compose(View $view)
    {
        $categoryOptions = Category::getCategoryOptions('name', 'id');
        $view->with('categoryOptions', $categoryOptions);
    }
}