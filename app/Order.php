<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'type', 'total', 'address'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function details()
    {
        return $this->hasMany('App\Detail');
    }
}
