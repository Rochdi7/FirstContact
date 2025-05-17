<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreTypeRequest;
use App\Http\Requests\UpdateStoreTypeRequest;
use App\Models\StoreType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StoreTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(!auth()->user()->can('access store_types'), 403);

        if ($request->ajax()) {

            $query = StoreType::query();

            $datatables = DataTables::eloquent($query)
                ->addColumn('created_at_blade', function ($storeType) {
                    return view('admin.store_types.datatableColumns.created_at_blade', compact('storeType'));
                })
                ->addColumn('actions', function ($storeType) {
                    return view('admin.store_types.datatableColumns.actions', compact('storeType'));
                });

            // Enable sorting by translated name
            $datatables->orderColumn('name', function ($query, $order) {
                $query->orderByTranslation('name', $order);
            });

            // Enable filtering by translated name
            $datatables->filterColumn('name', function ($query, $keyword) {
                $query->whereTranslationLike('name', "%{$keyword}%");
            });

            return $datatables->make(true);
        }

        return view('admin.store_types.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create store_types'), 403);

        return view('admin.store_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreTypeRequest $request)
    {
        StoreType::create($request->validated());

        return redirect()->route('admin.store_types.index')->with('success', __('store_types.messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreType $storeType)
    {
        return view('admin.store_types.edit', compact('storeType'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreType $storeType)
    {
        return view('admin.store_types.edit', compact('storeType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreTypeRequest $request, StoreType $storeType)
    {
        $storeType->update($request->validated());

        return redirect()->route('admin.store_types.index')->with('success', __('store_types.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreType $storeType)
    {
        abort_if(!auth()->user()->can('delete store_types'), 403);

        $storeType->delete();

        return back()->with('success', __('store_types.messages.deleted'));
    }
}
