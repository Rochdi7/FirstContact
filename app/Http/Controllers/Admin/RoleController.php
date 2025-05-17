<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->can('access roles'), 403);

        $roles = Role::with(['permissions'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(!auth()->user()->can('create roles'), 403);
        $permissions = Permission::pluck('name', 'id');
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        abort_if(!auth()->user()->can('create roles'), 403);

        $role = Role::create(['name' => $request->name]);
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index')->with('success', 'Roles created successfully.');
    }

    public function edit(Role $role)
    {
        abort_if(!auth()->user()->can('edit roles'), 403);

        $permissions = Permission::pluck('name', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(!auth()->user()->can('show roles'), 403);

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_if(!auth()->user()->can('delete roles'), 403);

        $role->delete();

        return back();
    }

}
