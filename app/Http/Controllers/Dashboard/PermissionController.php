<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function index()
    {
       $roles = Role::get();
       return view('dashboard.permissions.index', ['roles' => $roles]);
    }

    public function show($id, PermissionRepositoryInterface $permissionRepository)
    {
        $permissions = $permissionRepository->all();
        $role = Role::findById($id);
        return view('dashboard.permissions.show', ['role' => $role, 'permissions' => $permissions]);
    }


    public function create(PermissionRepositoryInterface $permissionRepository)
    {
        $permissions = $permissionRepository->all();
        return view('dashboard.permissions.create', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $request->validate([
           'role' => 'required|min:4',
           'permissions' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->role,
            'guard_name' => 'web',
        ]);

        $role->givePermissionTo($request->permissions);
        toastSuccess(trans('site.added_successfully'));
        return redirect()->route('dashboard.permissions.index');
    }


    public function edit(PermissionRepositoryInterface $permissionRepository, $id)
    {
        $permissions = $permissionRepository->all();
        $role = Role::findById($id);
        return view('dashboard.permissions.edit',[
            'role' => $role,
            'permissions' => $permissions
        ]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'role'  => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::findById($id);
        $role->update(['name' => $request->role]);
        $role->syncPermissions($request->permissions);
        toastSuccess(trans('site.updated_successfully'));
        return redirect()->route('dashboard.permissions.index');
    }

}
