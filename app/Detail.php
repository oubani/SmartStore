<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'product_id', 'quantity', 'price', 'order_id'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
