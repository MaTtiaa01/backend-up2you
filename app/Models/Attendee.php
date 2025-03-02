<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email'];

    protected $table = 'attendees';
}
