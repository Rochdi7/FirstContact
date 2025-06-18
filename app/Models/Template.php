<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'view_path',
    ];

    /**
     * Many-to-Many relation with Plan.
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_template');
    }
}
