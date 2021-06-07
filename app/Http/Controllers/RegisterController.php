<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function generateView()
    {
        return view('register');
    }

    public function save(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',

            'name' => 'required',
            'surname' => 'required',

            'city' => 'required',
            'street' => 'required'
        ]);

        $users = new User;

        $users->username = $request->login;
        $users->password = $request->password;

        $users->role = "user";

        $users->name = $request->name;
        $users->surname = $request->surname;

        $users->city = $request->city;
        $users->street = $request->street;

        $save = $users->save();

        if ($save) {
            return view('login');
            return back()->with('Zarejestrowano pomyślnie.');
        } else {
            return back()->with('Rejestracja nie powiodła się.');
        }


        return $request->input();
    }
}
