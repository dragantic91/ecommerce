<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 12-Dec-17
 * Time: 12:52
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Database\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function result(Request $request)
    {
        $queryParam = $request->get('q');

        $products = Product::where('name', 'like', "%". $queryParam ."%")
            ->where('status', '=', 1)->paginate(12);

        return view('front.search.results')
            ->with('queryParam', $queryParam)
            ->with('products', $products);
    }
}