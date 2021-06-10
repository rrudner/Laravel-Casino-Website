<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


    public function generateView()
    {
        return view('payment', [
            'user' => Auth::user(),
            'role' => $this->checkRole(Auth::user()->role)
        ]);
    }

    public function deposit(Request $request)
    {
        $this->user = Auth::user();
        $this->user->wallet = $this->user->wallet + $request->amount;
        $save = $this->user->save();

        if ($save) {
            return back()->with('status', 'wpłata została zrealizowana pomyślnie');
        }
    }

    public function withdraw()
    {
        $this->user = Auth::user();
        $this->user->wallet = 0;
        $save = $this->user->save();
        if ($save) {
            return back()->with('status', 'wypłata została wykonana pomyślnie');
        }
    }
}
