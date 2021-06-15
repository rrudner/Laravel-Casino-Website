<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


    public function generateView()
    {
        $this->checkWallet();
        return view('payment', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role)
        ]);
    }

    public function deposit(Request $request)
    {
        $this->user = Auth::user();

        $payment = new Payment();
        $payment->user_id = $this->user->id;
        $payment->amount = $request->amount;
        $payment->withdraw = 0;
        $save = $payment->save();

        if ($save) {
            $payment->created_by = $this->user->id;
            $payment->updated_by = $this->user->id;
            $payment->save();
            return redirect()->route('home')->with('status', 'Płatność została zrealizowana pomyślnie');
        } else {
            return back()->with('status', 'Płatność nie została zrealizowana');
        }
    }

    public function withdraw()
    {
        $this->user = Auth::user();
        if (!($this->user->wallet <= 0)) {
            $payment = new Payment();
            $payment->user_id = $this->user->id;
            $payment->amount = $this->user->wallet;
            $payment->withdraw = 1;
            $save = $payment->save();

            if ($save) {
                $payment->created_by = $this->user->id;
                $payment->updated_by = $this->user->id;
                $payment->save();
                return back()->with('status', 'Wypłata została zrealizowana pomyślnie');
            } else {
                return back()->with('status', 'Wypłata nie została zrealizowana');
            }
        } else {
            return back()->with('status', 'Brak środków na koncie.');
        }
    }
}
