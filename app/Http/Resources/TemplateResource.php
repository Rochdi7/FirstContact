<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TemplateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'user_id'    => $this->user_id,
            'name'       => $this->name,
            'view_path'  => $this->view_path,
            'created_at' => $this->created_at?->format('Y-m-d\TH:i:s.v\Z'),
            'updated_at' => $this->updated_at?->format('Y-m-d\TH:i:s.v\Z'),
        ];
    }
}
