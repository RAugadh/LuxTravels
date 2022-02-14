<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'chat_instance_id',
        'user_id',
        'sent_at',
        'message',
    ];
    public function chat_instances()
    {
        return $this->belongsTo('App\Models\ChatInstances');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}