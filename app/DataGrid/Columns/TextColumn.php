<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/30/2017
 * Time: 2:02 PM
 */

namespace App\DataGrid\Columns;


use Illuminate\Support\Facades\Route;

class TextColumn extends AbstractColumn
{
    protected $type = 'text';

    public function ascUrl()
    {
        $currentRouteName = Route::getCurrentRoute()->getName();
        return route($currentRouteName, ['asc' => $this->identifier()]);
    }

    public function descUrl()
    {
        $currentRouteName = Route::getCurrentRoute()->getName();
        return route($currentRouteName, ['desc' => $this->identifier()]);
    }
}