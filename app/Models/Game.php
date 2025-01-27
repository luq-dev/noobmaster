<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Game extends Model
{
    protected $fillable = ['title', 'rating', 'release_date', 'cover','trailer_link'];


}
