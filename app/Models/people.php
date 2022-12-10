<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class people extends Model
{
    protected $table = "users";
    protected $primarykey= "id";
    protected $fillabel =[
        'id',	'name',	'surname', 'patr',	'phone',	'dateborn',	'login', 'type', 'block'
    ];
  

}