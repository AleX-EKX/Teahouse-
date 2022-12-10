<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'patr', 'phone', 'dateborn', 'login', 'type', 'block'
    ];

    public const ROLES = [
        'admin'     => 1,
        'cook'      => 2,
        'waiter'    => 3,
        'dev'       => 4,
        'ban'       => 5
    ];

    public const RU_SELECT_ROLES = [
        ['admin',   'администратор'],
        ['cook',    'повар'],
        ['waiter',  'офицант'],
        //['dev',     'разработчик'],
        ['ban',     'заблокирован']
    ];

    public function getRole() {
        $val = strval($this->type);
        if      ($val == 'cook')    return "cook";
        else if ($val == 'admin')   return "admin";
        else if ($val == 'waiter')  return "waiter";
        else if ($val == 'dev')     return "dev";
        else if ($val == 'ban')     return "ban";
    }

    public function getRuRole() {
        $val = strval($this->type);
        if      ($val == 'cook')    return "повар";
        else if ($val == 'admin')   return "администратор";
        else if ($val == 'waiter')  return "офицант";
        else if ($val == 'dev')     return "разработчик";
        else if ($val == 'ban')     return "заблокирован";
    }

    public static function getRoleById($id) {
        $val = $id;
        if      ($val == 'cook')    return "cook";
        else if ($val == 'admin')   return "admin";
        else if ($val == 'waiter')  return "waiter";
        else if ($val == 'dev')     return "dev";
        else if ($val == 'ban')     return "ban";
    }

    public function getFullName() {
        return $this->surname . " " . substr($this->name, 0, 2) . ". " . substr($this->patr, 0, 2) . ".";
    }
    public function getLongFullName() {
        return $this->surname . " " . $this->name . " " . $this->patr;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
}
