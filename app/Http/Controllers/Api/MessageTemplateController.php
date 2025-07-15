<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageTemplateResource;
use App\Models\MessageTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageTemplateController extends Controller
{
    public function index()
    {
        $templates = MessageTemplate::where('user_id', auth()->id())->get();

        return MessageTemplateResource::collection($templates)
            ->additional(['message' => 'Message templates fetched successfully.']);
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
            'name'    => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'body'    => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        $template = MessageTemplate::create([
            'user_id' => $userId,
            'name'    => $validated['name'],
            'subject' => $validated['subject'],
            'body'    => $validated['body'],
        ]);

        return (new MessageTemplateResource($template))
            ->additional([
                'message' => 'Message template created successfully.'
            ])
            ->response()
            ->setStatusCode(201);
    }

    public function show(MessageTemplate $messageTemplate)
    {
        $this->authorizeTemplate($messageTemplate);

        return (new MessageTemplateResource($messageTemplate))
            ->additional(['message' => 'Message template retrieved successfully.']);
    }

    public function update(Request $request, MessageTemplate $messageTemplate)
    {
        $this->authorizeTemplate($messageTemplate);

        $validator = Validator::make($request->all(), [
            'name'    => ['sometimes', 'required', 'string', 'max:255'],
            'subject' => ['sometimes', 'required', 'string', 'max:255'],
            'body'    => ['sometimes', 'required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        $messageTemplate->update($validated);

        return (new MessageTemplateResource($messageTemplate))
            ->additional(['message' => 'Message template updated successfully.']);
    }

    public function destroy(MessageTemplate $messageTemplate)
    {
        $this->authorizeTemplate($messageTemplate);

        $messageTemplate->delete();

        return response()->json([
            'message' => 'Message template deleted successfully.'
        ], 200);
    }

    protected function authorizeTemplate(MessageTemplate $messageTemplate)
    {
        if ($messageTemplate->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
    }
}
