<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
