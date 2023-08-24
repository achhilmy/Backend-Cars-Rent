<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';

    protected $fillable = 
    [ 
        'name', 'carType', 'rating','fuel',
        'image','hourRate','dayRate','monthRate',
      
    ];

}
