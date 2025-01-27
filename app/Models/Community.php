<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = ['name'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
