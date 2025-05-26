<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!auth()->user()->can('access plans'), 403);

        if ($request->ajax()) {
            $query = Plan::query();

            $datatables = DataTables::eloquent($query)
                ->addColumn('name', fn($plan) => $plan->name)
                ->addColumn('ai_enabled', fn($plan) => $plan->ai_enabled ? 'Yes' : 'No')
                ->addColumn('features', function ($plan) {
                    return is_array($plan->features)
                        ? implode(', ', $plan->features)
                        : $plan->features;
                })
                ->addColumn('created_at_blade', fn($plan) => view('admin.plans.datatableColumns.created_at_blade', compact('plan')))
                ->addColumn('actions', fn($plan) => view('admin.plans.datatableColumns.actions', compact('plan')));

            $datatables->orderColumn('name', function ($query, $order) {
                $query->orderByTranslation('name', $order);
            });

            $datatables->filterColumn('name', function ($query, $keyword) {
                $query->whereTranslationLike('name', "%{$keyword}%");
            });

            return $datatables->make(true);
        }

        return view('admin.plans.index');
    }

    public function create()
    {
        abort_if(!auth()->user()->can('create plans'), 403);

        return view('admin.plans.create');
    }

    public function store(StorePlanRequest $request)
    {
        $data = $request->only(['max_templates', 'ai_enabled', 'price']);
        $plan = new Plan($data);

        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $features = [];

            $featuresJson = $request->input("{$locale}.features");
            if ($featuresJson) {
                $decoded = json_decode($featuresJson, true);
                if (is_array($decoded)) {
                    $features = array_map(fn($item) => $item['value'], $decoded);
                }
            }

            $plan->translateOrNew($locale)->name = $request->input("{$locale}.name");
            $plan->translateOrNew($locale)->features = $features;
        }

        $plan->save();

        return redirect()->route('admin.plans.index')->with('success', __('plans.messages.created'));
    }

    public function edit(Plan $plan)
    {
        abort_if(!auth()->user()->can('edit plans'), 403);

        return view('admin.plans.edit', compact('plan'));
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $data = $request->only(['max_templates', 'ai_enabled', 'price']);
        $plan->fill($data);

        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $features = [];

            $featuresJson = $request->input("{$locale}.features");
            if ($featuresJson) {
                $decoded = json_decode($featuresJson, true);
                if (is_array($decoded)) {
                    $features = array_map(fn($item) => $item['value'], $decoded);
                }
            }

            $plan->translateOrNew($locale)->name = $request->input("{$locale}.name");
            $plan->translateOrNew($locale)->features = $features;
        }

        $plan->save();

        return redirect()->route('admin.plans.index')->with('success', __('plans.messages.updated'));
    }

    public function destroy(Plan $plan)
    {
        abort_if(!auth()->user()->can('delete plans'), 403);

        $plan->delete();

        return back()->with('success', __('plans.messages.deleted'));
    }
}
