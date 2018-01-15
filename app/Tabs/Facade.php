<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 13-Dec-17
 * Time: 12:29
 */
namespace App\Tabs;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Tabs\TabsMaker';
    }
}