<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primarykey= "id";
    protected $fillabel =[
        'id',	'name',	'img',	'idMenuType',	'price', 'desc'
    ];
    public $timestamps = false;

    

}
