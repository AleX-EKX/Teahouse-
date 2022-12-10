<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "tickets";
    protected $primarykey= "id";
    protected $fillabel =[
        'id',	'basket',	'dateCreate',	'dateClose',	'status'
    ];
        protected $casts = [
        'basket' => 'array'
    ];


}
