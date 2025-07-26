<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Support\Facades\View;

class TemplatePreviewController extends Controller
{
    public function preview($id)
    {
        $template = Template::find($id);

        if (!$template) {
            return response()->json(['error' => 'Template not found.'], 404);
        }

        $viewPath = $template->view_path ?? 'templates.default';

        if (!View::exists($viewPath)) {
            return response()->json([
                'error' => 'View not found: ' . $viewPath
            ], 404);
        }

        // Fake message instance just for rendering context
        $dummyMessage = (object)[
            'user' => auth()->user(),
        ];

        $html = View::make($viewPath, [
            'message' => $dummyMessage,
            'subject' => $template->name ?? 'Preview Subject',
            'body' => $template->content ?? 'No body content available.',
        ])->render();

        return response()->json([
            'html' => $html
        ]);
    }
}
