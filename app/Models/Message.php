<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message_content'];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
