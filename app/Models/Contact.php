<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Contact extends Model implements HasMedia
{
    use InteractsWithMedia;

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

