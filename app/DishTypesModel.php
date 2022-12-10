<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishTypesModel extends Model
{
    protected $table = 'menuTypes';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = [
        'name', 'img'
    ];

    public function dishes() {
        return $this->hasMany('App\DishModel', 'idMenuType', 'id');
    }
}
