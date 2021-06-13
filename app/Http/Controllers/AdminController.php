<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function generateView()
    {
        return view('admin', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
        ]);
    }
    public function generateViewPayments()
    {
        return view('admin-payments', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
            'payments' => DB::table('payments')
                ->leftJoin('users as u1', 'u1.id', 'payments.user_id')
                ->leftJoin('users as u2', 'u2.id', 'payments.created_by')
                ->leftJoin('users as u3', 'u3.id', 'payments.updated_by')
                ->select('payments.*', 'u1.username as user_id', 'u2.username as created_by', 'u3.username as updated_by')
                ->paginate(10)
        ]);
    }

    public function deletePayment($paymentId)
    {
        $this->user = Auth::user();
        if (Payment::find($paymentId)) {
            $payment = Payment::where('id', '=', $paymentId)->first();
            $payment->updated_by = $this->user->id;
            $payment->save();
            Payment::withoutTrashed()->find($paymentId)->delete();
            return back()->with('status', 'Płatność została usunięta.');
        } else {
            Payment::withTrashed()->find($paymentId)->restore();
            $payment = Payment::where('id', '=', $paymentId)->first();
            $payment->updated_by = $this->user->id;
            $payment->save();
            return back()->with('status', 'Płatność została przywrócona.');
        }
    }

    public function deleteUser($userId)
    {
        $this->user = Auth::user();
        if ($this->user->id == $userId)
            return back()->with('status', 'Nie możesz usunąć własnego konta.');
        if (User::find($userId)) {
            $user = User::where('id', '=', $userId)->first();
            $user->updated_by = $this->user->id;
            $user->save();
            User::withoutTrashed()->find($userId)->delete();
            return back()->with('status', 'Użytkownik został usunięty.');
        } else {
            User::withTrashed()->find($userId)->restore();
            $user = User::where('id', '=', $userId)->first();
            $user->updated_by = $this->user->id;
            $user->save();
            return back()->with('status', 'Użytkownik został przywrócony.');
        }
    }


    public function generateViewUsers()
    {
        return view('admin-users', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
            'users' => DB::table('users')
                ->leftJoin('roles', 'roles.id', 'users.role')
                ->leftJoin('users as u1', 'u1.id', 'users.created_by')
                ->leftJoin('users as u2', 'u2.id', 'users.updated_by')
                ->select('users.*', 'roles.name as role', 'u1.username as created_by', 'u2.username as updated_by')
                ->paginate(10),
        ]);
    }

    public function generateViewEditUser($userId)
    {
        return view('admin-users-edit', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
            'editedUser' => DB::table('users')
                ->where('id', '=', $userId)
                ->first(),
            'roles' => DB::table('roles')
                ->get(),
        ]);
    }

    public function editUser(Request $request)
    {
        $this->user = Auth::user();
        $editedUser = User::where('id', '=', $request->id)->first();

        if ($request->login)
            $editedUser->username = $request->login;
        if ($request->password)
            $editedUser->password = Hash::make($request->password);
        if ($request->name)
            $editedUser->name = $request->name;
        if ($request->surname)
            $editedUser->surname = $request->surname;
        if ($request->city)
            $editedUser->city = $request->city;
        if ($request->street)
            $editedUser->street = $request->street;
        if ($request->role)
            $editedUser->role = $request->role;
        $editedUser->updated_by = $this->user->id;
        $save = $editedUser->save();
        if ($save) {
            return redirect()->route('adminUsers')->with('status', 'Edycja użytkownika zakończyła się sukcesem.');
        } else {
            return back()->with('status', 'Wystąpił błąd podczas edycji.');
        }
    }
}
