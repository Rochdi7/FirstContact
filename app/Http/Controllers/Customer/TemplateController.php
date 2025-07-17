<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TemplateController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('viewAny', Template::class);

        if ($request->ajax()) {
            $query = Template::query();

            $datatables = DataTables::eloquent($query)
                ->addColumn('name', fn($template) => $template->name)
                ->addColumn('view_path', fn($template) => $template->view_path)
                ->addColumn(
                    'created_at_blade',
                    fn($template) => view('customer.templates.datatableColumns.created_at_blade', compact('template'))
                )
                ->addColumn(
                    'actions',
                    fn($template) => view('customer.templates.datatableColumns.actions', [
                        'template' => $template,
                        'routePrefix' => 'customer.templates.'
                    ])
                );

            return $datatables->make(true);
        }

        return view('customer.templates.index');
    }

    public function show(Template $template)
    {
        $this->authorize('view', $template);

        return view('customer.templates.show', compact('template'));
    }

    public function preview(Template $template)
    {
        $this->authorize('view', $template);

        $viewPath = $template->view_path;

        if (!view()->exists($viewPath)) {
            abort(404, 'Template view not found.');
        }

        $data = $this->dummyData($viewPath);

        return view($viewPath, $data);
    }

    /**
     * Provide dummy data for previewing templates.
     *
     * @param string $viewPath
     * @return array
     */
    private function dummyData(string $viewPath): array
    {
        return match ($viewPath) {
            'templates.invoice' => [
                'invoice_number' => 'INV-001',
                'invoice_date' => now()->format('Y-m-d'),
                'customer_name' => 'Acme Corporation',
                'items' => [
                    ['name' => 'Product A', 'quantity' => 2, 'price' => 49.99],
                    ['name' => 'Product B', 'quantity' => 1, 'price' => 99.99],
                ],
                'subtotal' => 199.97,
                'tax' => 20.00,
                'total' => 219.97,
            ],
            'templates.hackathon_invite' => [
                'event_name' => 'Laravel Hackathon',
                'event_date' => '2025-08-15',
                'event_location' => 'Online Zoom Call',
                'recipient_name' => 'Jane Doe',
                'registration_link' => 'https://hackathon-register.example.com',
            ],
            'templates.event_reminder' => [
                'event_title' => 'Annual Gala Dinner',
                'event_date' => '2025-09-01',
                'event_location' => 'Conference Hall A',
                'recipient_name' => 'John Smith',
            ],
            'templates.general_announcement' => [
                'announcement_title' => 'Important Update from Our Company',
                'announcement_body' => 'We are thrilled to announce new features launching next month. Stay tuned for astonishment!',
                'recipient_name' => 'Alex Johnson',
            ],
            'templates.new_offer' => [
                'recipient_name' => 'rochdi karouali',
                'offer_details' => '50% off on your next purchase',
                'expiry_date' => '2025-07-16',
            ],
            default => [],
        };
    }
}