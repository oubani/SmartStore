<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //

    protected $fillable = ['product_id', 'value', 'date_start', 'date_expires'];
}
