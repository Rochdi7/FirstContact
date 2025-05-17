<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Plan::all();
            return datatables()->of($data)
                ->addColumn('ai_enabled', function ($row) {
                    return $row->ai_enabled ? 'Yes' : 'No';
                })
                ->addColumn('features', function ($row) {
                    if (is_array($row->features)) {
                        return implode(", ", $row->features);
                    }
                    return $row->features;
                })
                ->addColumn('actions', function ($row) {
                    return '
                <a href="' . route('admin.plans.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>
                <form action="' . route('admin.plans.destroy', $row->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $plans = Plan::all();

        return view('admin.plans.index', compact('plans'));
    }



    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_templates' => 'required|integer',
            'ai_enabled' => 'required|boolean',
            'price' => 'required|numeric',
            'features' => 'nullable|string',
        ]);

        // Convert features string to array
        $features = explode(',', $request->features);

        // Store the plan
        $plan = Plan::create([
            'name' => $request->name,
            'max_templates' => $request->max_templates,
            'ai_enabled' => $request->ai_enabled,
            'price' => $request->price,
            'features' => $features
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully.');
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_templates' => 'required|integer',
            'ai_enabled' => 'required|boolean',
            'price' => 'required|numeric',
            'features' => 'nullable|string', // Changed back to string for form
        ]);

        // Convert the string to an array
        $features = explode(',', $request->features);

        $plan = Plan::findOrFail($id);
        $plan->update([
            'name' => $request->name,
            'max_templates' => $request->max_templates,
            'ai_enabled' => $request->ai_enabled,
            'price' => $request->price,
            'features' => $features
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.');
    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully.');
    }
}
