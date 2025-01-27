<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // create read update delete
    public function createUser($id)
    {
        // redirect to home
    }

    public function getUser($id)
    {
        //json to view
    }

    public function getAge($id) {
        $user = User::find($id);
        $yob = (int)substr($user->date_of_birth, 0,4);
        $datenow = (int)date('Y');
        return $datenow-$yob;
    }
    public function delete(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $user->delete();

        return redirect()->intended('/login');
    }
}
