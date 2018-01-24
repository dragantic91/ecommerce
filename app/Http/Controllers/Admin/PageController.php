<?php

namespace App\Http\Controllers\Admin;

use App\Models\Database\PageUberUns;
use App\Models\Database\PageWirKaufen;
use Illuminate\Http\Request;
use App\DataGrid\Facade as DataGrid;
use App\Models\Database\PageHome;
use Illuminate\Support\Facades\File;
//use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManager;

class PageController extends Base
{

    public function home()
    {
        $dataGrid = DataGrid::model(PageHome::query())
            ->column('heading', ['sortable' => true, 'label' => __('lang.heading')])
            ->linkColumn('destroy', ['label' => __('lang.destroy')], function ($model) {
                return  "<a href=' " . route('admin.home.destroy', $model->id) . " ' >".__('lang.destroy')."</a>";
            });

        return view('admin.page.home.index')->with('dataGrid', $dataGrid);
    }


    public function homeCreate()
    {
        return view('admin.page.home.create');
    }


    public function homeStore(Request $request)
    {
        $this->validate($request, [
           'heading' => 'required',
            'body' => 'required',
            'button' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        $image = $request->image;
        $name = time() . $image->getClientOriginalName();
        $folder = '\front\assets\img\slider';
        $savePath = public_path($folder);
        $image->move($savePath, $name);
        $dbPath = $folder . '\\' . $name;


        PageHome::create([
            'heading' => strtoupper($request->heading),
            'body' => $request->body,
            'button' => $request->button,
            'image' => $dbPath
        ]);
        return redirect()->route('admin.page.home');
    }


    public function homeDestroy($id)
    {
        $slider = PageHome::findorfail($id);
        File::delete(public_path($slider->image));
        $slider->delete();
        return redirect()->back();
    }


    public function uberUns()
    {
        $dataGrid = DataGrid::model(PageUberUns::query()->where('key', '=', 'image'))
            ->column('banner_name', ['sortable' => true, 'label' => __('lang.banner-name')])
            ->linkColumn('destroy', ['label' => __('lang.destroy')], function ($model) {
                return  "<a href=' " . route('admin.uber-uns.destroy', $model->id) . " ' >".__('lang.destroy')."</a>";
            });

        $text = PageUberUns::where('key', '=', 'text')->first();

        return view('admin.page.uberUns.index')
            ->with(['text' => $text, 'dataGrid' => $dataGrid]);
    }


    public function textUpdateUberUns(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $text = PageUberUns::findorfail($id);
        $text->value = $request->body;
        $text->update();

        return redirect()->back()
            ->with(['success' => __('lang.update-success')]);
    }


    public function bannerUberUnsCreate()
    {
        return view('admin.page.uberUns.create');
    }


    public function bannerUberUnsStore(Request $request)
    {
        $this->validate($request, [
            'banner_name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        $image = $request->image;
        $name = time() . $image->getClientOriginalName();
        $folder = '\front\assets\img\about';
        $savePath = public_path($folder);
//        $manager = new ImageManager(array('driver' => 'gd'));
//        $image = $manager->make($image->getRealPath())->resize(1140, 480)->save($savePath);
//        Image::make($image->getRealPath())->resize(1140, 480)->save($savePath);
        $image->move($savePath, $name);
        $dbPath = $folder . '\\' . $name;


        PageUberUns::create([
            'banner_name' => $request->banner_name,
            'key' => 'image',
            'value' => $dbPath
        ]);
        return redirect()->route('admin.page.uber-uns');
    }

    public function bannerUberUnsDestroy($id)
    {
        $banner = PageUberUns::findorfail($id);
        File::delete(public_path($banner->value));
        $banner->delete();
        return redirect()->back();
    }


    public function wirKaufen()
    {
        $description = PageWirKaufen::all()->first();
        return view('admin.page.wirKaufen.index')
            ->with('description', $description);
    }


    public function updateWirKaufen(Request $request, $id)
    {
        $description = PageWirKaufen::findorfail($id);
        $description->body = $request->body;
        $description->update();

        return redirect()->back()->with(['success' => __('lang.update-success')]);
    }
}
