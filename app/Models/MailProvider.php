<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailProvider extends Model
{
    protected $fillable = ['user_id', 'provider', 'account_name', 'settings'];

    protected $casts = [
        'settings' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

