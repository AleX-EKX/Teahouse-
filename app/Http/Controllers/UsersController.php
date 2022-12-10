<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\people;
use App\Http\Requests\Authorize;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{

   
    public function LoginComputerPost(Authorize $request) {
        // Итак
        if (Auth::attempt(['login' => $request->input('login'), 'password' => $request->input('password')])){
            return redirect('computerPartApp/main');
        }
        else return redirect('computerPartApp/login')->withInput();
    }

    public function createusers() {
        return view('computer.users.createusers');
    }
        //Пользователи
    //users добавление пользователя
    public function processcreateusers(Request $rege){
        $people = new people();
        $people->name = $rege->input('name');
        $people->surname = $rege->input('surname');
        $people->patr = $rege->input('patr');
        $people->phone = $rege->input('phone');
        $people->dateborn = $rege->input('dateborn');
        $people->login = $rege->input('login');
        $people->password = $rege->input('password');
       
        $people->type = $rege->input('type');

        $people->save();

        return redirect()->route('users');
    }
 
    //взятие данных с бд
    public function taking(){
        $people = new people();
         return view('computer.users.users', ['data'=>people::all()]);
        
    }
    //удаление данных определенного id
    public function delusers($id){
        people::find($id)->delete();
        return redirect()->route('users')->with('success','Пользователь удален');
    }
//открытие данных определенного id для редактирования
    public function updateusers($id){
        $people = new people();
        return view('computer.users.updateusers', ['data'=>$people->find($id)]);
    }
    public function processupdateusers($id, Request $rege){
        $people = people::find($id);
       
        $people->type = $rege->input('type');
        $people->type = $rege->input('block');

        $people->save();

        return redirect()->route('users');
    }
}
