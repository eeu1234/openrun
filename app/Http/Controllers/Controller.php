<?php

namespace App\Http\Controllers;


use App\Models\Store;

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

        return view('welcome');
    }



    public function storeList(){
        $store = Store::with(['salesLog'])->get();
        \Log::info("DDDDDDDDDDDDDDDDDDDDDDDDDDDD");
        \Log::info([$store]);
        return response()->json($store);

    }




}
