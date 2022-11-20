<?php

namespace App\Http\Controllers;


use App\Models\Store;
use App\Models\Sale_Log;

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
        $store = Sale_log::with(['schedule'])->get();
        \Log::info("DDDDDDDDDDDDDDDDDDDDDDDDDDDD");
        \Log::info([$store]);
        return response()->json($store);

    }
    public function groupByStoreList(){
        $storeList = Store::select('STORENAME')
            ->groupByRaw('STORENAME')
            ->get();
        return response()->json($storeList);
    }

    public function mainSchedule(){
        $store = DB::table('SALES_LOG')
            ->join('STORE', 'SALES_LOG.STORECODE', '=', 'STORE.STORECODE')
            ->join('PRODUCT_DETAIL', 'SALES_LOG.FINALPRODUCTCODE', '=', 'PRODUCT_DETAIL.FINALPRODUCTCODE')
            ->select('SALES_LOG.SOLDDATE', 'STORE.STORENAME', 'STORE.STORELOCATION', 'PRODUCT_DETAIL.FINALPRODUCTNAME')
            ->get();
        return response()->json($store);
    }

    public function productDetailPage(){
        $productInfo = DB::table('SALES_LOG')
            ->join('STORE', 'SALES_LOG.STORECODE', '=', 'STORE.STORECODE')
            ->join('PRODUCT_DETAIL', 'SALES_LOG.FINALPRODUCTCODE', '=', 'PRODUCT_DETAIL.FINALPRODUCTCODE')
            ->select( 'SALES_LOG.STORECODE',DB::raw('MAX(SALES_LOG.SOLDDATE)') ,'SALES_LOG.FINALPRODUCTCODE', 'STORE.STORENAME', 'STORE.STOREDETAIL_LOCATION','PRODUCT_DETAIL.SIZE','PRODUCT_DETAIL.COLOR','PRODUCT_DETAIL.COLOR2','PRODUCT_DETAIL.PATTERN','PRODUCT_DETAIL.MATERIAL')
            ->groupBy('SALES_LOG.FINALPRODUCTCODE')
            ->get();

        $test = DB::table(function ($q) {
            $q->from('PRODUCT');
        })
            ->get();

        \Log::info([$productInfo]);
        return response()->json($test);
    }

}
