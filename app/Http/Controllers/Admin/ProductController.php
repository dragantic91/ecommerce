<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProductAfterSave;
use App\Events\ProductBeforeSave;
use App\Http\Requests\ProductRequest;
use App\Image\LocalFile;
use App\Models\Database\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataGrid\Facade as DataGrid;
use Illuminate\Support\Facades\Event;
use App\Image\Facade as Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGrid = DataGrid::model(Product::query())
            ->column('product_no', ['sortable' => true, 'label' => __('lang.product-number')])
            ->column('name', ['sortable' => true, 'label' => __('lang.name')])
            ->linkColumn(__('lang.edit'), [], function ($model) {
                return "<a href='" . route('admin.product.edit', $model->id) . "' >".__('lang.edit')."</a>";
            })
            ->linkColumn(__('lang.delete'), [], function ($model) {
                return "<form id='admin-product-destroy-" . $model->id . "'
                                            method='POST'
                                            action='" . route('admin.product.destroy', $model->id) . "'>
                                        <input name='_method' type='hidden' value='DELETE' />
                                        " . csrf_field() . "
                                        <a href='#'
                                            onclick=\"jQuery('#admin-product-destroy-$model->id').submit()\"
                                            >". __('lang.delete') ."</a>
                                    </form>";
            });

        return view('admin.product.index')
            ->with('dataGrid', $dataGrid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.new-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Product::create($request->all());
        } catch (\Exception $e) {
            echo 'Error in Saving Product: ', $e->getMessage(), "\n";
        }

        return redirect()->route('admin.product.edit', ['id' => $product->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorfail($id);

        return view('admin.product.edit')
            ->with('model', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            Event::fire(new ProductBeforeSave($request));
            $product = Product::findorfail($id);
            $product->saveProduct($request);
            Event::fire(new ProductAfterSave($product, $request));

        } catch (\Exception $e) {
            throw new \Exception('Error in Saving Product: ' . $e->getMessage());
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.product.index');
    }

    /**
     * Upload image file and resize it.
     *
     */
    public function uploadImage(Request $request)
    {
        $image = $request->file('image');
        $tmpPath = str_split(strtolower(str_random(3)));
        $checkDirectory = '/uploads/catalog/images/' . implode('/', $tmpPath);

        $dbPath = $checkDirectory . "/" . $image->getClientOriginalName();

        $image = Image::upload($image, $checkDirectory);

        $tmp = $this->_getTmpString();

        return view('admin.product.upload-image')
            ->with('image', $image)
            ->with('tmp', $tmp);
    }

    /**
     * Delete image file
     */
    public function deleteImage(Request $request)
    {
        $path = $request->get('path');

        LocalFile::deleteImages($path);

        return JsonResponse::create(['status' => true]);
    }

    /**
     * Return random string only lower and without digits.
     */
    public function _getTmpString($length = 6)
    {
        $pool = 'abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
