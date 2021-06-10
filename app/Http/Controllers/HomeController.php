<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function generateView()
    {
        return view('home', [
            'user' => Auth::user(),
            'role' => $this->checkRole(Auth::user()->role)
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
