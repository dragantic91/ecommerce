<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/30/2017
 * Time: 1:44 PM
 */

namespace App\Http\Controllers\Admin;

use App\DataGrid\Facade as DataGrid;
use App\Http\Requests\AdminUserRequest;
use App\Models\Database\AdminUser;
use App\Models\Database\Role;

class AdminUserController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataGrid = DataGrid::model(AdminUser::query()->orderBy('id', 'desc'))
            ->column('id', ['sortable' => true])
            ->column('first_name', ['label' => __('lang.first-name')])
            ->column('last_name', ['label' => __('lang.last-name')])
            ->linkColumn('edit',['label' => __('lang.edit')], function($model) {
                return "<a href='". route('admin.admin-user.edit', $model->id)."' >". __('lang.edit')."</a>";
            })
            ->linkColumn('destroy', ['label' => __('lang.destroy')], function ($model) {
                return "<form id='admin-admin-user-destroy-" . $model->id . "' 
                                                method='POST' 
                                                action'#'>
                                                <input name='_method' type='hidden' value='DELETE' />
                                                " . csrf_field() . "
                                                <a href='#'
                                                    onclick=\"jQuery('#admin-admin-user-destroy-$model->id').submit()\"
                                                    >".__('lang.destroy')."</a>
                       </form>";
            })
            ->setPagination(100);
        return view('admin.admin-user.index')->with('dataGrid', $dataGrid);
    }

    public function store(AdminUserRequest $request)
    {
        $request->merge(['password' => bcrypt($request->get('password'))]);


        //TMP only once we add user role then remove it???

        $role = Role::all()->first();
        $request->merge(['role_id' => $role->id]);

        AdminUser::create($request->all());

        return redirect()->route('admin.admin-user.index');
    }

    public function create()
    {
        $roles = $this->_getRoleOptions();
        return view('admin.admin-user.create')
            ->with('roles', $roles)
            ->with('editMethod', true);
    }

    public function storePost(AdminUserRequest $request)
    {
        $request->merge(['password' => bcrypt($request->get('password'))]);

        $role = Role::all()->first();
        $request->merge(['role_id' => $role->id]);

        AdminUser::create($request->all());

        return redirect()->route('admin.admin-user.index');
    }

    public function edit($id)
    {
        $user = AdminUser::findorfail($id);
        $roles = $this->_getRoleOptions();
        return view('admin.admin-user.edit')
            ->with('model', $user)
            ->with('roles', $roles)
            ->with('editMethod', true);
    }

    public function update(AdminUserRequest $request, $id)
    {
        $user = AdminUser::findorfail($id);

        $user->update($request->all());

        return redirect()->route('admin.admin-user.index');
    }

    private function _getRoleOptions()
    {
        return [0 => 'Bitte auswählen'] + Role::all()->pluck('name', 'id')->toArray();
    }


}