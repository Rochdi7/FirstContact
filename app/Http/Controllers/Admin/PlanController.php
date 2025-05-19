<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    abort_if(!auth()->user()->can('access plans'), 403);

    if ($request->ajax()) {
        $query = Plan::query();

        $datatables = DataTables::eloquent($query)
            ->addColumn('ai_enabled', function ($plan) {
                return $plan->ai_enabled ? 'Yes' : 'No';
            })
            ->addColumn('features', function ($plan) {
                if (is_array($plan->features)) {
                    return implode(", ", $plan->features);
                }
                return $plan->features;
            })
            ->addColumn('created_at_blade', function ($plan) {
                return view('admin.plans.datatableColumns.created_at_blade', compact('plan'));
            })
            ->addColumn('actions', function ($plan) {
                return view('admin.plans.datatableColumns.actions', compact('plan'));
            });

        return $datatables->make(true);
    }

    return view('admin.plans.index');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create plans'), 403);

        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        $features = explode(',', $request->features);

        Plan::create([
            'name' => $request->name,
            'max_templates' => $request->max_templates,
            'ai_enabled' => $request->ai_enabled,
            'price' => $request->price,
            'features' => $features,
        ]);

        return redirect()->route('admin.plans.index')->with('success', __('plans.messages.created'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        abort_if(!auth()->user()->can('edit plans'), 403);

        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $features = explode(',', $request->features);

        $plan->update([
            'name' => $request->name,
            'max_templates' => $request->max_templates,
            'ai_enabled' => $request->ai_enabled,
            'price' => $request->price,
            'features' => $features,
        ]);

        return redirect()->route('admin.plans.index')->with('success', __('plans.messages.updated'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        abort_if(!auth()->user()->can('delete plans'), 403);

        $plan->delete();

        return back()->with('success', __('plans.messages.deleted'));
    }
}
