<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use App\Models\Database\Page;
use App\DataGrid\Facade as DataGrid;

class PageController extends AdminController
{
    /**
     * Display a listing of the Page.
     */
    public function index()
    {
        $dataGrid = DataGrid::model(Page::query())
            ->column('id',['sortable' => true])
            ->column('name', ['label' => __('lang.name'), 'sortable' => true])
            ->column('slug', ['label' => __('lang.slug'), 'sortable' => true])
            ->column('meta_title', ['label' => __('lang.meta-title')])
            ->linkColumn('edit',[], function($model) {
                return "<a href='". route('admin.page.edit', $model->id)."' >". __('lang.edit')."</a>";

            })->linkColumn('destroy',['label' => __('lang.delete')], function($model) {
                return "<form id='admin-page-destroy-".$model->id."'
                                            method='POST'
                                            action='".route('admin.page.destroy', $model->id) ."'>
                                        <input name='_method' type='hidden' value='DELETE' />
                                        ". csrf_field()."
                                        <a href='#'
                                            onclick=\"jQuery('#admin-page-destroy-$model->id').submit()\"
                                            >". __('lang.delete')."</a>
                                    </form>";
            });

        return view('admin.page.index')->with('dataGrid', $dataGrid);
    }

    /**
     * Show the form for creating a new page.
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created page in database.
     */
    public function store(PageRequest $request)
    {
        Page::create($request->all());

        return redirect()->route('admin.page.index');
    }

    /**
     * Show the form for editing the specified page.
     */
    public function edit($id)
    {
        $page = Page::findorfail($id);

        return view('admin.page.edit')->with('model', $page);
    }

    /**
     * Update the specified page in database.
     */
    public function update(PageRequest $request, $id)
    {
        $page = Page::findorfail($id);
        $page->update($request->all());

        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified page from storage.
     */
    public function destroy($id)
    {
        Page::destroy($id);

        return redirect()->route('admin.page.index');
    }
}
