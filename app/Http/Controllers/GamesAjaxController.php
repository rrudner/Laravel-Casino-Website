<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GamesAjaxController extends Controller
{
    public function index()
    {
        $games = DB::table('games')
            ->leftJoin('users as u1', 'u1.id', 'games.user_id')
            ->leftJoin('users as u2', 'u2.id', 'games.updated_by')
            ->select('games.*', 'u1.username as user_id', 'u2.username as updated_by')
            ->get();

        return response()->json($games);
    }
}
