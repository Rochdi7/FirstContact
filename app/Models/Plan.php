<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'max_templates',
        'ai_enabled',
        'price',
    ];

    /**
     * Translatable fields.
     */
    public $translatedAttributes = ['name', 'features'];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'ai_enabled' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Accessor to get the formatted price.
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2) . ' $';
    }

    /**
     * Many-to-Many relation with Template.
     */
    public function templates()
    {
        return $this->belongsToMany(Template::class, 'plan_template');
    }
}
