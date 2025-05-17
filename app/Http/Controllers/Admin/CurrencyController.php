<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(!auth()->user()->can('access currencies'), 403);

        if ($request->ajax()) {

            $query = Currency::query();

            $datatables = DataTables::eloquent($query)
                ->addColumn('created_at_blade', function ($currency) {
                    return view('admin.currencies.datatableColumns.created_at_blade', compact('currency'));
                })
                ->addColumn('actions', function ($currency) {
                    return view('admin.currencies.datatableColumns.actions', compact('currency'));
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

        return view('admin.currencies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create currencies'), 403);

        return view('admin.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurrencyRequest $request)
    {
        Currency::create($request->validated());

        return redirect()->route('admin.currencies.index')->with('success', __('currencies.messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        return view('admin.currencies.edit', compact('currency'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        return view('admin.currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        return redirect()->route('admin.currencies.index')->with('success', __('currencies.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        abort_if(!auth()->user()->can('delete currencies'), 403);

        $currency->delete();

        return back()->with('success', __('currencies.messages.deleted'));
    }
}
