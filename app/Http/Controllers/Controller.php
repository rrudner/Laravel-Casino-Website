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

        foreach ($amounts as $amount => $column) {
            if ($column->withdraw == 0 && $column->deleted_by == null) {
                $updatedWallet += $column->amount;
            }
            if ($column->withdraw == 1 && $column->deleted_by == null) {
                $updatedWallet -= $column->amount;
            }
        }

        $this->user->wallet = $updatedWallet;
        $save = $this->user->save();
        return ($save);
    }
}
