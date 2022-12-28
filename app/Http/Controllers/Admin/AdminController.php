<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loadProductInfo(Request $request)
    {
        \Log::info($request[0]);
        $productInfo = DB::table('SALES_LOG')
            ->join('STORE', 'SALES_LOG.STORECODE', '=', 'STORE.STORECODE')
            ->join('PRODUCT_DETAIL', 'SALES_LOG.FINALPRODUCTCODE', '=', 'PRODUCT_DETAIL.FINALPRODUCTCODE')
            ->select( 'SALES_LOG.SOLDDATE','PRODUCT_DETAIL.FINALPRODUCTNAME', 'STORE.STORENAME', 'STORE.STORELOCATION','PRODUCT_DETAIL.SIZE','PRODUCT_DETAIL.COLOR','PRODUCT_DETAIL.COLOR2','PRODUCT_DETAIL.PATTERN','PRODUCT_DETAIL.MATERIAL')
            ->where('SALES_LOG.SOLDDATE', '>=',$request[0])
            ->where('SALES_LOG.SOLDDATE', '<=',$request[1])
            ->get();
        return response()->json($productInfo);
    }

    public function searchProduct(Request $request)
    {
        if($request[0] != null and $request[4] == null ){
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->where('SIZE','like', '%'.$request[1].'%')
                ->where('COLOR', '=', $request[2])
                ->where('COLOR2', 'like', '%'.$request[3].'%')
                ->where('FINALPRODUCTNAME','like','%'.$request[0].'%')
                ->get();
            return response()->json($productInfo);
        }
        elseif($request[4] != null and $request[0] == null){
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->where('SIZE','like', '%'.$request[1].'%')
                ->where('COLOR', '=', $request[2])
                ->where('COLOR2', 'like', '%'.$request[3].'%')
                ->where('MATERIAL','like','%'.$request[4].'%')
                ->get();
            return response()->json($productInfo);
        }
        elseif($request[4] != null and $request[0] != null){
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->where('SIZE','like', '%'.$request[1].'%')
                ->where('COLOR', '=', $request[2])
                ->where('COLOR2', 'like', '%'.$request[3].'%')
                ->Where('FINALPRODUCTNAME','like','%'.$request[0].'%')
                ->where('MATERIAL','like','%'.$request[4].'%')
                ->get();
            return response()->json($productInfo);
        }
        else{ //둘다 비어있을때
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->where('SIZE','like', '%'.$request[1].'%')
                ->where('COLOR', '=', $request[2])
                ->where('COLOR2', 'like', '%'.$request[3].'%')
                ->get();
            return response()->json($productInfo);
        }

    }

}
