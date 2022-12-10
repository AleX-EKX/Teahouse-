<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesModel extends Model
{
    protected $table = "expenses";
    protected $primarykey= "id";
    protected $fillabel =[
        'id',	'name',	'price'
    ];
    public $timestamps = false;

    
}
