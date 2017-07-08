<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCheck extends Model
{
    protected $fillable = [
        'UserID', 'BandID',
    ];
}
