<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ContactController extends Controller
{
    use AuthorizesRequests;
    
    public function index(Request $request)
    {
        $this->authorize('viewAny', Contact::class);

        if ($request->ajax()) {
            $query = Contact::where('user_id', auth()->id());

            $datatables = DataTables::eloquent($query)
                ->addColumn('first_name', fn($contact) => $contact->first_name)
                ->addColumn('last_name', fn($contact) => $contact->last_name)
                ->addColumn('email', fn($contact) => $contact->email)
                ->addColumn('phone', fn($contact) => $contact->phone)
                ->addColumn('company', fn($contact) => $contact->company)
                ->addColumn(
                    'created_at_blade',
                    fn($contact) => view('customer.contacts.datatableColumns.created_at_blade', compact('contact'))
                )
                ->addColumn('actions', fn($contact) => view('customer.contacts.datatableColumns.actions', compact('contact')));

            return $datatables->make(true);
        }

        return view('customer.contacts.index');
    }

    public function create()
    {
        $this->authorize('create', Contact::class);
        return view('customer.contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Contact::create($validated);

        return redirect()->route('customer.contacts.index')->with('success', __('contacts.messages.created'));
    }

    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact);
        return view('customer.contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);
        $contact->update($request->validated());

        return redirect()->route('customer.contacts.index')->with('success', __('contacts.messages.updated'));
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return view('customer.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();

        return back()->with('success', __('contacts.messages.deleted'));
    }
}
