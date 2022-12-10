<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = [
        'name', 'img', 'idMenuType', 'price', 'desc'
    ];
    protected $casts = [
        'price' => 'array'
    ];

    public function type() {
        return $this->belongsTo('App\DishTypesModel', 'id', 'idMenuType');
    }
}
