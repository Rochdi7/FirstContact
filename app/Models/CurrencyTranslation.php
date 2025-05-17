<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Mutator to capitalize the first letter of each word
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
}
