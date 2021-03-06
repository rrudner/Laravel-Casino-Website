<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function generateView()
    {
        Auth::logout();
        return view('register');
    }

    public function save(Request $request)
    {
        $request->validate([
            'login' => 'required|min:3|max:13',
            'password' => 'required|min:3|max:28',

            'name' => 'required|min:3|max:13',
            'surname' => 'required|min:3|max:28',

            'city' => 'required|min:3|max:30',
            'street' => 'required|min:3|max:30'
        ]);

        if (!($role = Role::where('name', '=', 'user')->first())) {
            $role = new Role;
            $role->name = 'user';
            $save = $role->save();
            $role = new Role;
            $role->name = 'admin';
            $save = $role->save();
        } else {
            $role = Role::where('name', '=', 'user')->first();
        }

        $user = new User;

        $user->username = $request->login;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->city = $request->city;
        $user->street = $request->street;

        $user->role = $role->id;

        try {
            $save = $user->save();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('register')->with('status', 'Użytkownik o takim loginie już istnieje. <br> Jeśli nie możesz się zalogować, twoje konto zostało zablokowane. <br> Skontaktuj się z administratorem.');
        }

        if ($save) {
            $user->created_by = $user->id;
            $user->updated_by = $user->id;
            $save = $user->save();

            return redirect()->route('login')->with('status', 'Konto zostało zarejestrowane pomyślnie.');
        } else {
            return back();
        }
    }
}
