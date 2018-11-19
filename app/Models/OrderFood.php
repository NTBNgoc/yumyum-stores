<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    protected $table = 'order_food';
    protected $fillable = [
        'id',
        'quantity',
        'price',
        'food_id',
        'order_id',
    ];
    public $timestamps = false;

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
