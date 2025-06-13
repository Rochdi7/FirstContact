<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'name',
        'view_path',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
