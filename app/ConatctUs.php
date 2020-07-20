<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConatctUs extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'message', 'type'
    ];
}
