<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $user = User::where('idtest', 1)->get('test');
//        $user = User::all();
//        $memos = Memo::orderBy('created_at', 'desc')->get();
//        $user = DB::table('test')->get();

        \Log::info([$user]);

        return view('welcome', ['user' => $user]);
    }
}
