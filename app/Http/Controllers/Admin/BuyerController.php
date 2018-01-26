<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 06-Jan-18
 * Time: 02:32
 */

namespace App\Http\Controllers\Admin;

use App\Models\Database\User;
use App\DataGrid\Facade as DataGrid;

class BuyerController extends AdminController
{
    public function index()
    {
        $dataGrid = DataGrid::model(User::query())
            ->column('id', ['sortable' => true])
            ->column('first_name', ['sortable' => true, 'label' => __('lang.first-name')])
            ->column('last_name', ['sortable' => true, 'label' => __('lang.last-name')])
            ->column('email', ['sortable' => true, 'label' => __('lang.email')])
            ->column('created_at', ['label' => __('lang.created-at')])
            ->column('updated_at', ['label' => __('lang.last-login')])
            ->setPagination(100);

        return view('admin.buyer.index')->with('dataGrid', $dataGrid);
    }
}