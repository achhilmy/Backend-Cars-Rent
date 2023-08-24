<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'order';

    protected $fillable = 
    [ 
        'pickUpLoc', 'dropOffLoc', 'pickUpDate','dropOffDate',
        'pickUpTime'
      
    ];

}
