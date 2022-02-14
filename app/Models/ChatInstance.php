<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatInstance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'assigned_to',
        'subject',
    ];
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function chat_messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}