<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(!auth()->user()->can('access users'), 403);
//        $cities = City::has('users')->pluck('name', 'id')->prepend('Filtrer par ville', '');
//        $promos=Company::whereNotNull('promo')->orderBy('promo')->pluck('promo', 'promo')->prepend('Filtrer par promo', '');

        $count_users = User::count();
//        if (Auth::user()->is_admin or Auth::user()->is_user) {
//            $count_users = User::whereHas('roles', function (Builder $query) {
//                $query->where('id', '>', 1);
//            })->count();
//        }

        if ($request->ajax()) {

            $query = User::query();
//            if (Auth::user()->is_admin or Auth::user()->is_user) {
//                $query->whereHas('roles', function (Builder $query) {
//                    $query->where('id', '>', 1);
//                });
//            }
            $query->with(['roles']);

            $datatables = DataTables::eloquent($query)
                ->addColumn('avatar', function ($user) {
                    return view('admin.users.datatableColumns.avatar', compact('user'));
                })
                ->editColumn('roles', function ($user) {
                    return view('admin.users.datatableColumns.roles', compact('user'));
                })
                ->editColumn('created_at_blade', function ($user) {
                    return view('admin.users.datatableColumns.created_at_blade', compact('user'));
                })
                ->editColumn('last_activity_blade', function ($user) {
                    return view('admin.users.datatableColumns.last_activity_blade', compact('user'));
                })
                ->addColumn('actions', function ($user) {
                    return view('admin.users.datatableColumns.actions', compact('user'));
                });

            $datatables->filterColumn('first_name', function ($query, $keyword) {
                $query->whereRaw("CONCAT(last_name,' ',first_name) like ?", ["%{$keyword}%"])
                    ->ORwhereRaw("CONCAT(first_name,' ',last_name) like ?", ["%{$keyword}%"])
                    ->ORwhereRaw("last_name like ?", ["%{$keyword}%"])
                    ->ORwhereRaw("first_name like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('roles', function ($query, $keyword) {
                $query->whereHas('roles', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                });
            });
            return $datatables->make(true);
        }

        return view('admin.users.index', compact('count_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create users'), 403);

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('role', []));

        if ($request->input('photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return redirect()->route('admin.users.index')->with('success', __('users.messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort_if(!auth()->user()->can('show users'), 403);

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_if(!auth()->user()->can('edit users'), 403);

        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->validated());
        $user->roles()->sync($request->input('role', []));


        if ($request->input('photo', false)) {
            if (!$user->photo || $request->input('photo') !== $user->photo->file_name) {
                if ($user->photo) {
                    $user->photo->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
        }

        return redirect()->route('admin.users.index')->with('success', __('users.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_if(!auth()->user()->can('delete users'), 403);

        $user->delete();

        return back()->with('success', __('users.messages.deleted'));
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Redirect with a success message
        return redirect()->route('admin.users.index')->with('success', __('users.messages.password_updated'));
    }
}
