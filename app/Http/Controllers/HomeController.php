<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function generateView()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        return view('home', [
            'user' => $user
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
