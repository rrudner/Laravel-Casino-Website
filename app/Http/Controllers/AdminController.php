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
            'user' => Auth::user(),
            'role' => $this->checkRole(Auth::user()->role),
        ]);
    }
    public function generateViewPayments()
    {
        $this->hmm();
        return view('admin-payments', [
            'user' => Auth::user(),
            'role' => $this->checkRole(Auth::user()->role),
            'payments' => DB::table('payments')
                ->leftJoin('users', 'payments.user_id', 'users.id')
                ->select('payments.*', 'users.username',)
                ->paginate(10),
        ]);
    }
    public function hmm()
    {
        $data = DB::table('payments')
            ->leftJoin('users', 'payments.user_id', 'users.id')
            ->select('payments.*', 'users.username',)
            ->get();
        echo "<pre>";
        print_r($data);
        dd();
    }
}
