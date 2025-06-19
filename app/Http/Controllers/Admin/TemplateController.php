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
            $query = Template::with('plans');

            $datatables = DataTables::eloquent($query)
                ->addColumn('name', fn($template) => $template->name)
                ->addColumn('plans', function ($template) {
                    return $template->plans->pluck('name')->implode(', ');
                })
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
        $views = $this->getAvailableViews();

        return view('admin.templates.create', compact('plans', 'views'));
    }


    public function store(StoreTemplateRequest $request)
    {
        $this->authorize('create', Template::class);

        $template = Template::create([
            'name' => $request->name,
            'view_path' => $request->view_path,
        ]);

        $template->plans()->sync($request->input('plan_ids', []));

        return redirect()->route('admin.templates.index')->with('success', __('templates.messages.created'));
    }

    public function edit(Template $template)
    {
        $this->authorize('update', $template);

        $plans = Plan::all();
        $views = $this->getAvailableViews();

        $template->load('plans');

        return view('admin.templates.edit', compact('template', 'plans', 'views'));
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $this->authorize('update', $template);

        $template->update([
            'name' => $request->name,
            'view_path' => $request->view_path,
        ]);

        $template->plans()->sync($request->input('plan_ids', []));

        return redirect()->route('admin.templates.index')->with('success', __('templates.messages.updated'));
    }

    public function destroy(Template $template)
    {
        $this->authorize('delete', $template);

        $template->delete();

        return back()->with('success', __('templates.messages.deleted'));
    }

    private function getAvailableViews()
    {
        return collect(glob(resource_path('views/templates/*.blade.php')))
            ->map(function ($path) {
                return str_replace(
                    [resource_path('views/'), '.blade.php', '/'],
                    ['', '', '.'],
                    $path
                );
            });
    }
}
