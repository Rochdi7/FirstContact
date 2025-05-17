<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(!auth()->user()->can('access countries'), 403);

        if ($request->ajax()) {

            $query = Country::query();

            $datatables = DataTables::eloquent($query)
                ->addColumn('created_at_blade', function ($country) {
                    return view('admin.countries.datatableColumns.created_at_blade', compact('country'));
                })
                ->addColumn('actions', function ($country) {
                    return view('admin.countries.datatableColumns.actions', compact('country'));
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

        return view('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create countries'), 403);

        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('admin.countries.index')->with('success', __('countries.messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('admin.countries.edit', compact('country'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()->route('admin.countries.index')->with('success', __('countries.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        abort_if(!auth()->user()->can('delete countries'), 403);

        $country->delete();

        return back()->with('success', __('countries.messages.deleted'));
    }
}
