<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','description', 'schedulated_at', 'location', 'max_attendees'];

    protected $table = 'events';
}
