<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'first_name'      => $this->first_name,
            'last_name'       => $this->last_name,
            'name'            => $this->name,
            'email'           => $this->email,
            'phone'           => $this->phone,
            'birthday'        => $this->birthday,
            'gender'          => $this->gender,
            'approved'        => $this->approved,
            'last_activity'   => $this->last_activity,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
            'roles'           => $this->getRoleNames(),
        ];
    }
}
