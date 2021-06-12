<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                ->leftJoin('users', 'payments.user_id', 'users.id')
                ->select('payments.*', 'users.username',)
                ->paginate(10),
        ]);
    }
    public function deletePayment($paymentId)
    {
        $payment = Payment::find($paymentId);
        $this->user = Auth::user();
        if ($payment->deleted_by == null) {
            $payment->updated_by = $this->user->id;
            $payment->deleted_by = $this->user->id;
            $save = $payment->save();
            if ($save)
                return back()->with('status', 'Usunięto płatność');
        } else {
            $payment->updated_by = $this->user->id;
            $payment->deleted_by = null;
            $save = $payment->save();
            if ($save)
                return back()->with('status', 'Przywrócono płatność');
        }
    }


    public function generateViewUsers()
    {
        return view('admin-users', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
            'users' => DB::table('users')
                ->paginate(10),
        ]);
    }
}
