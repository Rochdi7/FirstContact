<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['plan_id', 'name', 'view_path'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
