<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'company', 'email', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messageRecipients()
    {
        return $this->hasMany(MessageRecipient::class);
    }
}

