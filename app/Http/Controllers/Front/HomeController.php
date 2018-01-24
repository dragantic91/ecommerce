<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/19/2017
 * Time: 2:08 PM
 */

namespace App\Http\Controllers\Front;


use App\Models\Database\Configuration;
use App\Models\Database\Page;
use App\Models\Database\PageHome;
use App\Models\Database\Product;

class HomeController extends Base
{
    public function index()
    {

        $pageModel = null;
        $pageId = Configuration::getConfiguration('general_home_page');
        $hitAndNewProducts = Product::where('new_product', 1)->orWhere('hit_product', 1)->get();

        $sliders = PageHome::all();


        if(null !== $pageId) {
            $pageModel = Page::find($pageId);
        }

        return view('front.home.index')
            ->with('pageModel', $pageModel)
            ->with('hitAndNewProducts', $hitAndNewProducts)
            ->with('sliders', $sliders);

    }
}