<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Authorize;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

use Jenssegers\Agent\Agent;

use App\MsgsModel;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Computer
    public function LoginComputerGet() {
        return view('computer.authorization.login');
    }
    public function LoginComputerPost(Authorize $request) {
        if (Auth::attempt(['login' => $request->input('login'), 'password' => $request->input('password')])){
            if (Auth::user()->type == 'admin' || Auth::user()->type == 'dev') {
                return redirect(route('mainComp'));
            }
            else{
                Auth::logout();
                return redirect('computerPartApp/login')->withInput()->withErrors(['error' => 'Ваша учетная запись не подходит.']);
            }
        }
        else { return redirect('computerPartApp/login')->withInput()->withErrors(['error' => 'Данные не совпадают!']); }
    }
    public function MainCompGet() {
        return view('computer.main');
    }
    public function LogoutComputerGet() {
        Auth::logout();

        return redirect('computerPartApp/login');
    }

    // Mobile
    public function LoginMobileGet() {
        return view('mobile.authorization.login');
    }
    public function LoginMobilePost(Authorize $request) {
        if (Auth::attempt(['login' => $request->input('login'), 'password' => $request->input('password')])){
            if (Auth::user()->type != 'ban')
                return redirect('mobilePartApp/main');
            else {
                Auth::logout();
                return redirect('mobilePartApp/login')->withInput()->withErrors(['error' => 'Ваша учетная запись заблокирована! Обратитесь к администратору заведения.']);
            }
        }
        else return redirect('mobilePartApp/login')->withInput()->withErrors(['error' => 'Данные не совпадают!']);
    }

    public function RegisterMobileGet() {
        return view('mobile.authorization.register');
    }

    public function RegisterMobilePost(Request $request) {
        $dataValidation = [
            'name' => 'required|min:2',
            'surname' => 'required|min:3',
            'patr' => 'required|min:4',
            'dateborn' => 'required',
            'phone' => 'required|min:11',
            'login' => 'required|min:6',
            'password' => 'required|min:6',
        ];
        Validator::make($request->all(), $dataValidation)->validate();

        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patr = $request->patr;
        $user->dateborn = $request->dateborn;
        $user->phone = $request->phone;
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('mobilePartApp/login')->withInput();
    }

    public function MainMobileGet(){
        $msgs = MsgsModel::orderBy('id', 'DESC')->get();

        return view('mobile.main', [
            'msgs' => $msgs
        ]);
    }
    public function LogoutMobileGet() {
        Auth::logout();

        return redirect('mobilePartApp/login');
    }

    // Web
    public function WebGet() {
        return view('web.welcome');
    }
}
