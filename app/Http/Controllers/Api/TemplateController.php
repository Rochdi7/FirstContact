<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::query()
            ->where(function ($query) {
                $query->whereNull('user_id') 
                    ->orWhere('user_id', auth()->id()); 
            })
            ->select('id', 'name', 'view_path') 
            ->get();

        return TemplateResource::collection($templates)
            ->additional(['message' => 'Templates fetched successfully.']);
    }
}
