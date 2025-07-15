<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', auth()->id())->get();

        return ContactResource::collection($contacts)
            ->additional(['message' => 'Contacts fetched successfully.']);
    }

    public function store(Request $request)
    {
        $userId = auth()->id();

        if (!$userId) {
            return response()->json([
                'message' => 'Unauthorized. No user authenticated.'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => [
                'required',
                'email',
                Rule::unique('contacts', 'email')
                    ->where(fn($query) => $query->where('user_id', $userId)),
            ],
            'phone'      => ['nullable', 'string', 'max:20'],
            'company'    => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        $contact = Contact::create([
            'user_id'    => $userId,
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? null,
            'company'    => $validated['company'] ?? null,
        ]);

        return (new ContactResource($contact))
            ->additional([
                'message' => 'Contact created successfully.'
            ])
            ->response()
            ->setStatusCode(201);
    }

    public function show(Contact $contact)
    {
        $this->authorizeContact($contact);

        return (new ContactResource($contact))
            ->additional(['message' => 'Contact retrieved successfully.']);
    }

    public function update(Request $request, Contact $contact)
    {
        $this->authorizeContact($contact);

        $validator = Validator::make($request->all(), [
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'last_name'  => ['sometimes', 'required', 'string', 'max:255'],
            'email'      => [
                'sometimes',
                'required',
                'email',
                Rule::unique('contacts', 'email')
                    ->ignore($contact->id)
                    ->where(fn($query) => $query->where('user_id', auth()->id())),
            ],
            'phone'      => ['nullable', 'string', 'max:20'],
            'company'    => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        $contact->update($validated);

        return (new ContactResource($contact))
            ->additional(['message' => 'Contact updated successfully.']);
    }

    public function destroy(Contact $contact)
    {
        $this->authorizeContact($contact);

        $contact->delete();

        return response()->json([
            'message' => 'Contact deleted successfully.'
        ], 200);
    }

    protected function authorizeContact(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
    }
}
