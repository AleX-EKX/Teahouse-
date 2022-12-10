<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catmenu extends Model
{
    protected $table = "tickets";
    protected $primarykey= "id";
    protected $fillabel =[
        'id',	'basket',	'dateCreate',	'dateClose',	'status'
    ];


}
