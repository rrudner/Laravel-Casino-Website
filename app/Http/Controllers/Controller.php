<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkRole($userRole)
    {
        return Role::where('id', '=', $userRole)->first()->name;
    }

    public function checkWallet()
    {
        $this->user = Auth::user();
        $updatedWallet = 0;

        $amounts = DB::table('payments')
            ->where([
                ['user_id', '=', $this->user->id],
            ])
            ->get([
                'amount',
                'withdraw',
                'deleted_by',
            ]);

        foreach ($amounts as $amount => $columns) {
            if ($columns->withdraw == 0 && $columns->deleted_by == null) {
                $updatedWallet += $columns->amount;
            }
            if ($columns->withdraw == 1 && $columns->deleted_by == null) {
                $updatedWallet -= $columns->amount;
            }
        }

        $this->user->wallet = $updatedWallet;
        $save = $this->user->save();
        return ($save);
    }
}
