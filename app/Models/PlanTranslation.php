<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'features'];

    protected $casts = [
        'features' => 'array',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
