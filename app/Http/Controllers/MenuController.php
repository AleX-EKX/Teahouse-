<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Requests\Authorize;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    
//взятие данных с бд меню
public function Menu(){
    $menu = new Menu();
     return view('computer.menu.menu', ['Menu'=>Menu::all()]);
    
}
public function createmenu() {
    return view('computer.menu.createmenu');
}
public function processcreatemenu(Request $menus){
    $Menu = new Menu();
    $Menu->name = $menus->input('name');
    $Menu->img = $menus->input('img');
    $Menu->idMenuType = $menus->input('idMenuType');
    $Menu->price = $menus->input('price');
    $Menu->desc = $menus->input('desc');

    $Menu->save();

    return redirect()->route('Menu');
}

 //удаление данных определенного id
 public function delmenu($id){
    Menu::find($id)->delete();
    return redirect()->route('Menu')->with('success','Пользователь удален');
}
//открытие данных определенного id для редактирования
public function updatemenu($id){
    $Menu = new Menu();
    return view('computer.menu.updatemenu', ['Menu'=>$Menu->find($id)]);
}
public function processupdatemenu($id, Request $menus){
    $Menu = Menu::find($id);
    $Menu->name = $menus->input('name');
    $Menu->img = $menus->input('img');
    $Menu->idMenuType = $menus->input('idMenuType');
    $Menu->price = $menus->input('price');
    $Menu->desc = $menus->input('desc');

    $Menu->save();

    return redirect()->route('Menu');
}


    
}
