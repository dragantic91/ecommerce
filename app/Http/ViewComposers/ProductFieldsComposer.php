<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 07-Dec-17
 * Time: 14:49
 */

namespace App\Http\ViewComposers;


use App\Models\Database\Category;
use Illuminate\View\View;

class ProductFieldsComposer
{
    public function compose(View $view)
    {
        $categoryOptions = Category::pluck('name', 'id');
        $storageOptions = []; //Storage::pluck('name', 'id');
        $view->with('categoryOptions', $categoryOptions)
            ->with('storageOptions',$storageOptions);
    }
}