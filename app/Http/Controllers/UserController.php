<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getLogin()
    {
        \Meta::set('title','ورود کاربر');

        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['phone' => $request->input('phone'), 'password' => $request->input('password')],1)) {
            return redirect()->intended('/admin/user/profile');
        }
        return redirect('/user/login')->withErrors('شماره همراه یا رمز عبور اشتباه است.');
    }

    public function getRegister()
    {
        \Meta::set('title','ثبت نام');

        return view('user.register');
    }

    public function postRegister(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required|numeric|unique:users',
        ])->validate();
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        // $user->notify(new \App\Notifications\VerificationCode($user->id));
        $request->session()->flash('alert-success', 'ثبت نام شما با موفقیت انجام شد. شما با شماره همراه '.$request['phone'] .' و رمز عبور '. $request['password'].' به سیستم وارد شدید.');
        
        if (Auth::attempt(['phone' => $request->input('phone'), 'password' => $request->input('password')],100000)) {
            return redirect()->intended('/admin/user/profile');
        }
        // return redirect('/user/login')->withErrors('شماره همراه یا رمز عبور اشتباه است.');

        // return redirect('/user/login');   
    }
}
