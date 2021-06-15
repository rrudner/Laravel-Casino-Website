<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function generateView()
    {
        $this->checkWallet();
        return view('account', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
        ]);
    }

    public function editAccount(Request $request)
    {
        $this->user = Auth::user();
        $editedUser = $this->user;

        $credentials = ([
            'username' => $this->user->username,
            'password' => $request->password
        ]);

        if (Auth::attempt($credentials)) {

            if ($request->newPassword) {
                $request->validate([
                    'newPassword' => 'min:3|max:28',
                ]);
                $editedUser->password = Hash::make($request->newPassword);
            }
            if ($request->city) {
                $request->validate([
                    'city' => 'min:3|max:30',
                ]);
                $editedUser->city = $request->city;
            }
            if ($request->street) {
                $request->validate([
                    'street' => 'min:3|max:30'
                ]);
                $editedUser->street = $request->street;
            }

            $save = $editedUser->save();
            if ($save) {
                return redirect()->route('home')->with('status', 'Edycja użytkownika zakończyła się sukcesem.');
            } else {
                return back()->with('status', 'Wystąpił błąd podczas edycji.');
            }
        } else {
            Auth::logout();
            return redirect()->route('login')->with('status', 'Wprowadzono błędne hasło podczas edycji konta <br> Zostałeś profilaktycznie wylogowany :)');
        }
    }
}
