<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 06-Jan-18
 * Time: 02:59
 */

namespace App\Http\Controllers\Admin;

use App\DataGrid\Facade as DataGrid;
use App\Models\Database\Subscriber;
use PDF;
use Illuminate\Http\Request;

class NewsletterController extends AdminController
{
    public function index()
    {
        $dataGrid = DataGrid::model(Subscriber::query())
            ->column('id', ['sortable' => true])
            ->column('email', ['sortable' => true, 'label' => __('lang.email')])
            ->linkColumn(__('lang.delete'), [], function ($model) {
                return "<form id='admin-newsletter-destroy-" . $model->id . "'
                                            method='POST'
                                            action='" . route('admin.newsletter.destroy', $model->id) . "'>
                                        <input name='_method' type='hidden' value='DELETE' />
                                        " . csrf_field() . "
                                        <a href='#'
                                            onclick=\"jQuery('#admin-newsletter-destroy-$model->id').submit()\"
                                            >". __('lang.delete') ."</a>
                                    </form>";
            });

        return view('admin.newsletter.index')->with('dataGrid', $dataGrid);
    }

    public function destroy($id)
    {
        Subscriber::destroy($id);
        return redirect()->route('admin.newsletter.index');
    }

    public function pdfView(Request $request)
    {
        $subscribers = Subscriber::all();
        view()->share('subscribers', $subscribers);

        if ($request->has('download')) {
            $pdf = PDF::loadView('admin.newsletter.pdfview');
            return $pdf->download('pdfview.pdf');
        }

        return view('admin.newsletter.pdfview');
    }
}