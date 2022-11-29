<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SearchController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main()
    {
        $user = Store::where('STORECODE', 1)->get('STORENAME');
        \Log::info([$user]);

        return view('search', ['user' => $user]);
    }
    //
}
