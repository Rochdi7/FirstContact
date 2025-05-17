<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->can('access permissions'), 403);

        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        abort_if(!auth()->user()->can('create permissions'), 403);

        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        abort_if(!auth()->user()->can('create permissions'), 403);

        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        abort_if(!auth()->user()->can('edit permissions'), 403);

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        abort_if(!auth()->user()->can('edit permissions'), 403);

        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        abort_if(!auth()->user()->can('delete permissions'), 403);

        abort('404','Permission not Delete');
        $permission->forceDelete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
