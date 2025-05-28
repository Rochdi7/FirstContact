<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['template_id', 'message_template_id', 'user_id', 'mail_provider_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function messageTemplate()
    {
        return $this->belongsTo(MessageTemplate::class);
    }

    public function mailProvider()
    {
        return $this->belongsTo(MailProvider::class);
    }

    public function recipients()
    {
        return $this->hasMany(MessageRecipient::class);
    }
}
