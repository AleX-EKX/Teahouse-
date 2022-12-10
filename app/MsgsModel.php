<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsgsModel extends Model
{
    protected $table = 'msgs';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = [
        'text', 'created_at'
    ];
}
