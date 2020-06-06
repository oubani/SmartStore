<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',  'description', 'prix', 'cover', 'categorie_id', 'stock',
    ];


    public function promo()
    {
        return $this->hasOne('App\Promotion');
    }
    public function detail()
    {
        return $this->hasOne('App\Detail');
    }
}
