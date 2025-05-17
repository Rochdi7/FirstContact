<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    protected $fillable = ['code'];
    public $translatedAttributes = ['name'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Mutator to always store country codes in uppercase
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

}
