<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function generateView()
    {
        $this->checkWallet();
        return view('game', [
            'loggedUser' => Auth::user(),
            'loggedRole' => $this->checkRole(Auth::user()->role),
            'loggedWallet' => Auth::user()->wallet
        ]);
    }
    public function gameWin($amount)
    {
        $this->user = Auth::user();
        $game = new Game;

        if ($amount == 0) {
            return redirect()->back()->with('status', 'Wygrałeś!!! <br> Następnym razem wpłać kasę :)')->with('bet', $amount);
        }

        if ($this->user->wallet < $amount) {
            return redirect()->back()->with('status', 'Nie masz kasy :(');
        } else {
            $game->user_id = $this->user->id;
            $game->updated_by = $this->user->id;
            $game->bet = $amount;
            $game->win = true;
            $game->wallet_before = $this->user->wallet;
            $game->wallet_after = $this->user->wallet + $amount;
            $game->save();
            return redirect()->back()->with('status', 'Wygrałeś!!!')->with('bet', $amount);
        }
    }
    public function gameLose($amount)
    {
        $this->user = Auth::user();
        $game = new Game;

        if ($amount == 0) {
            return redirect()->back()->with('status', 'Przegrałeś. <br> Ale się nie martw bo nic nie straciłeś.')->with('bet', $amount);
        }

        if ($this->user->wallet < $amount) {
            return redirect()->back()->with('status', 'Nie masz kasy :(');
        } else {
            $game->user_id = $this->user->id;
            $game->updated_by = $this->user->id;
            $game->bet = $amount;
            $game->win = false;
            $game->wallet_before = $this->user->wallet;
            $game->wallet_after = $this->user->wallet - $amount;
            $game->save();
            return redirect()->back()->with('status', 'Przegrałeś :(((')->with('bet', $amount);
        }
    }
    public function gameWin0()
    {
        return redirect()->back()->with('status', 'Nie oszukuj.');
    }

    public function gameLose0()
    {
        return redirect()->back()->with('status', 'Nie oszukuj.');
    }
}
