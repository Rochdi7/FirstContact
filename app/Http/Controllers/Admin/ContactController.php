<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!auth()->user()->can('access contacts'), 403);

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
                    fn($contact) => view('admin.contacts.datatableColumns.created_at_blade', compact('contact'))
                )
                ->addColumn('actions', fn($contact) => view('admin.contacts.datatableColumns.actions', compact('contact')));

            return $datatables->make(true);
        }

        return view('admin.contacts.index');
    }

    public function create()
    {
        abort_if(!auth()->user()->can('create contacts'), 403);

        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        abort_if(!auth()->user()->can('create contacts'), 403);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->where(
                    fn($query) =>
                    $query->where('user_id', auth()->id())
                ),
            ],
            'phone' => 'nullable|string|max:20',
        ]);

        $validated['user_id'] = auth()->id();

        Contact::create($validated);

        return redirect()->route('admin.contacts.index')->with('success', __('contacts.messages.created'));
    }


    public function edit(Contact $contact)
    {
        abort_if(!auth()->user()->can('edit contacts'), 403);
        $this->authorizeContact($contact);

        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        abort_if(!auth()->user()->can('edit contacts'), 403);
        $this->authorizeContact($contact);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($contact->id)->where(
                    fn($query) =>
                    $query->where('user_id', auth()->id())
                ),
            ],
            'phone' => 'nullable|string|max:20',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.index')->with('success', __('contacts.messages.updated'));
    }


    public function show(Contact $contact)
    {
        abort_if(!auth()->user()->can('show contacts'), 403);
        $this->authorizeContact($contact);

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        abort_if(!auth()->user()->can('delete contacts'), 403);
        $this->authorizeContact($contact);

        $contact->delete();

        return back()->with('success', __('contacts.messages.deleted'));
    }

    protected function authorizeContact(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }
}
