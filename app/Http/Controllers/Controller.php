<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkRole($userRole)
    {
        return Role::where('id', '=', $userRole)->first()->name;
    }

    // public function __construct()
    // {
    //     $this->user = Auth::user();
    // }

    // public function generateView($view)
    // {
    //     return view($view, [
    //         'user' => Auth::user()
    //     ]);
    // }
}
