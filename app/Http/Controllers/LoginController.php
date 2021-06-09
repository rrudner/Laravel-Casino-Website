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
        try {
            if (!$userInfo->password == $request->password) {
                return back()->with('status', 'Niepoprawny login, lub hasło');
            } else {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/');
            }
        } catch (\Throwable $e) {
            return back()->with('status', 'Niepoprawny login, lub hasło');
        }
    }
}
