<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Yajra\DataTables\Facades\DataTables;

class TemplateController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $this->authorize('viewAny', Template::class);

        if ($request->ajax()) {
            $query = Template::with('plan');

            $datatables = DataTables::eloquent($query)
                ->addColumn('name', fn($template) => $template->name)
                ->addColumn('plan', fn($template) => optional($template->plan)->name ?? '-')
                ->addColumn('view_path', fn($template) => $template->view_path)
                ->addColumn('created_at_blade', fn($template) => view('admin.templates.datatableColumns.created_at_blade', compact('template')))
                ->addColumn('actions', fn($template) => view('admin.templates.datatableColumns.actions', compact('template')));

            return $datatables->make(true);
        }

        return view('admin.templates.index');
    }

    public function create()
    {
        $this->authorize('create', Template::class);

        $plans = Plan::all();

        return view('admin.templates.create', compact('plans'));
    }

    public function store(StoreTemplateRequest $request)
    {
        $this->authorize('create', Template::class);

        Template::create($request->validated());

        return redirect()->route('admin.templates.index')->with('success', __('templates.messages.created'));
    }

    public function edit(Template $template)
    {
        $this->authorize('update', $template);

        $plans = Plan::all();

        return view('admin.templates.edit', compact('template', 'plans'));
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $this->authorize('update', $template);

        $template->update($request->validated());

        return redirect()->route('admin.templates.index')->with('success', __('templates.messages.updated'));
    }

    public function destroy(Template $template)
    {
        $this->authorize('delete', $template);

        $template->delete();

        return back()->with('success', __('templates.messages.deleted'));
    }
}
