<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main()
    {
        return view('search');
    }
    public function loadData()
    {
        $storeList = Store::select('STORECODE','STORENAME','STORELOCATION')
            ->get();
        return response()->json($storeList);
    }
    public function searchData()
    {

    }
}
