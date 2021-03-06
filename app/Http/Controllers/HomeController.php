<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function generateView()
    {
        $this->checkWallet();
        return view('home', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role)
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('status', 'wylogowano pomyślnie');
    }
}
