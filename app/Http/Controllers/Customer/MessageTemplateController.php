<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageTemplateRequest;
use App\Http\Requests\UpdateMessageTemplateRequest;
use App\Models\MessageTemplate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class MessageTemplateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = MessageTemplate::where('user_id', Auth::id());

            return DataTables::eloquent($query)
                ->addColumn('name', fn ($template) => $template->name)
                ->addColumn('subject', fn ($template) => $template->subject)
                ->addColumn('created_at_blade', fn ($template) => view('customer.message_templates.datatableColumns.created_at_blade', compact('template')))
                ->addColumn('actions', fn ($template) => view('customer.message_templates.datatableColumns.actions', compact('template')))
                ->rawColumns(['created_at_blade', 'actions'])
                ->make(true);
        }

        return view('customer.message_templates.index');
    }

    public function create()
    {
        return view('customer.message_templates.create');
    }

    public function store(StoreMessageTemplateRequest $request)
    {
        MessageTemplate::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('customer.message_templates.index')
            ->with('success', __('message_templates.messages.created'));
    }

    public function edit(MessageTemplate $messageTemplate)
    {
        $this->authorizeAccess($messageTemplate);

        return view('customer.message_templates.edit', compact('messageTemplate'));
    }

    public function update(UpdateMessageTemplateRequest $request, MessageTemplate $messageTemplate)
    {
        $this->authorizeAccess($messageTemplate);

        $messageTemplate->update([
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('customer.message_templates.index')
            ->with('success', __('message_templates.messages.updated'));
    }

    public function destroy(MessageTemplate $messageTemplate)
    {
        $this->authorizeAccess($messageTemplate);

        $messageTemplate->delete();

        return redirect()
            ->route('customer.message_templates.index')
            ->with('success', __('message_templates.messages.deleted'));
    }

    protected function authorizeAccess(MessageTemplate $messageTemplate)
    {
        if ($messageTemplate->user_id !== Auth::id()) {
            abort(403, __('Unauthorized access.'));
        }
    }
}
