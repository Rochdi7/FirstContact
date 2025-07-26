<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Message;

class MessagePreviewController extends Controller
{
    public function preview($id)
    {
        $message = Message::with(['template', 'user'])->findOrFail($id);

        $viewPath = $message->template->view_path ?? 'templates.default';

        if (!View::exists($viewPath)) {
            return response()->json([
                'error' => 'View not found: ' . $viewPath
            ], 404);
        }

        $subject = $message->template->name ?? 'Preview Subject';
        $body = $message->template->content ?? 'No body content provided.';

        $html = View::make($viewPath, [
            'message' => $message,
            'subject' => $subject,
            'body' => $body
        ])->render();

        return response()->json([
            'html' => $html
        ]);
    }
}
