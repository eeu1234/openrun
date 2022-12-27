<?php

namespace App\Http\Controllers;


use App\Models\Store;
use App\Models\Product_Detail;
use App\Models\Sale_Log;

use http\Env\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

        return view('main');
    }
    public function sendProductPage()
    {
        return view('search');
    }

    public function storeList(){
        $store = Store::select()->get();


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


        \Log::info([$productInfo]);
        return response()->json($productInfo);
    }

    public function searchPage(Request $request)
    {
        $searchWord = $request->input('searchWord') ?? "";
        $productInfo = DB::select("select A.*,B.PRODUCTNAME from PRODUCT_DETAIL A INNER JOIN PRODUCT B ON A.PRODUCTCODE = B.PRODUCTCODE
            where (
                A.FINALPRODUCTNAME LIKE '%{$searchWord}%' or
                A.SIZE LIKE '%{$searchWord}%' or
                A.COLOR LIKE '%{$searchWord}%' or
                A.COLOR2 LIKE '%{$searchWord}%' or
                A.PATTERN LIKE '%{$searchWord}%' or
                A.MATERIAL LIKE '%{$searchWord}%' or
                B.PRODUCTNAME LIKE '%{$searchWord}%')");
        return response()->json($productInfo);
    }


}
