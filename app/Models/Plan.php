<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'name',
        'max_templates',
        'ai_enabled',
        'price',
        'features',
    ];

    protected $casts =[
        'features' => 'array',
        'ai_enabled' => 'boolean',
    ];
}
