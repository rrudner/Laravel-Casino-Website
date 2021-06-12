<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('admin-payments', [
            'user' => Auth::user(),
            'role' => $this->checkRole(Auth::user()->role),
            'payments' => DB::table('payments')->paginate(10),
        ]);
    }
}
