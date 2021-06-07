<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function generateView()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $userInfo = User::where('username', '=', $request->login)->first();

        if (!$userInfo) {
            dd('zle');
            return back()->with('fail', 'Invalid username');
        } else {
            if ($userInfo->password == $request->password) {

                $request->session()->put('LoggedUser', $userInfo->iduser);
                return redirect('/');
            } else {

                return back()->with('fail', 'Invalid password');
            }
        }
    }
}
