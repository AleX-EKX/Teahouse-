<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'basket',
        'dateCreate',
        'dateClose',
        'dateCancel',
        'status',
        'countPeople',
        'numTable',
    ];

    protected $casts = [
        'basket' => 'array'
    ];

    public const STATUS = [
        'new' => 'new',
        'in_work' => 'in_work',
        'ready' => 'ready',
        'given_away' => 'given_away',
        'closed' => 'closed'
    ];

}
