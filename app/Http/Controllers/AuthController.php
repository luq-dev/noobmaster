<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\GameController;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        if (Auth::user()){
            return redirect()->intended('/');
        }
        return view('nm-login');
    }

    public function signup(){
        if(Auth::user()){
            return redirect()->intended('/');
        }
        return view('nm-register');
    }


    public function profile(Request $request) {
        $username = $request->user()->name;
        return view('nm-profile', ['auth_user'=> $username, 'username'=>$username]);
    }

    public function showForum(Request $request) {
        $id = $request->game_id;
        $game = Game::findOrFail($id);

        return view('nm-forum', ['auth_user'=>$request->user()->name]);
    }

    public function dashboard(Request $request) {
        return view('nm-adm-dashboard', ['auth_user'=>request()->user()->name]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            'password'=> 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))){
            if(Auth::user()->is_admin){
                return redirect()->intended('/dashboard')->with('success');    
            }else{
                return redirect()->intended('/')->with('success');
            }
        }

        return back()->withErrors(['email'=>'Invalid Credentials']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users|max:15',
            'email' => 'required|email|string|unique:users|max:255',
            'dob' => 'required',
            'password'=> 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->dob,
            'name' => $request->username
        ]);

        Auth::login($user);
        return redirect()->intended('/')->with('success');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success');
    }

}
