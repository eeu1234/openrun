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
        $productInfo = DB::table('SALES_LOG')
            ->join('STORE', 'SALES_LOG.STORECODE', '=', 'STORE.STORECODE')
            ->join('PRODUCT_DETAIL', 'SALES_LOG.FINALPRODUCTCODE', '=', 'PRODUCT_DETAIL.FINALPRODUCTCODE')
            ->select( 'SALES_LOG.SOLDDATE','PRODUCT_DETAIL.FINALPRODUCTNAME', 'STORE.STORENAME', 'STORE.STORELOCATION','PRODUCT_DETAIL.SIZE','PRODUCT_DETAIL.COLOR','PRODUCT_DETAIL.COLOR2','PRODUCT_DETAIL.PATTERN','PRODUCT_DETAIL.MATERIAL','SALES_LOG.SALECODE')
            ->where('SALES_LOG.SOLDDATE', '>=',$request[0])
            ->where('SALES_LOG.SOLDDATE', '<=',$request[1])
            ->get();
        return response()->json($productInfo);
    }
    public function loadClassify(Request $request)
    {
        $productInfo = DB::table('PRODUCT_CLASSIFY')
            ->select( 'CLASSIFYNAME','CLASSIFYCODE')
            ->get();
        return response()->json($productInfo);
    }
    public function loadCategory(Request $request)
    {
        $productInfo = DB::table('PRODUCT')
            ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
            ->select( 'PRODUCTNAME')
            ->where('PRODUCT_CLASSIFY.CLASSIFYNAME','=',$request->classify)
            ->get();
        return response()->json($productInfo);
    }
    public function loadProductName(Request $request)
    {
        \Log::info($request);
        $productInfo = DB::table('PRODUCT_DETAIL')
            ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
            ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
            ->select( 'FINALPRODUCTNAME')
            ->where('PRODUCT_CLASSIFY.CLASSIFYNAME','=',$request->classify)
            ->where('PRODUCT.PRODUCTNAME','=',$request->category)
            ->get();
        \Log::info($productInfo);
        return response()->json($productInfo);
    }

    public function searchProduct(Request $request)
    {
//        if($request[0] != null and $request[4] == null ){
//            $productInfo = DB::table('PRODUCT_DETAIL')
//                ->where('SIZE','like', '%'.$request[1].'%')
//                ->where('COLOR', '=', $request[2])
//                ->where('COLOR2', 'like', '%'.$request[3].'%')
//                ->where('FINALPRODUCTNAME','like','%'.$request[0].'%')
//                ->get();
//            return response()->json($productInfo);
//        }
//        elseif($request[4] != null and $request[0] == null){
//            $productInfo = DB::table('PRODUCT_DETAIL')
//                ->where('SIZE','like', '%'.$request[1].'%')
//                ->where('COLOR', '=', $request[2])
//                ->where('COLOR2', 'like', '%'.$request[3].'%')
//                ->where('MATERIAL','like','%'.$request[4].'%')
//                ->get();
//            return response()->json($productInfo);
//        }
//        elseif($request[4] != null and $request[0] != null){
//            $productInfo = DB::table('PRODUCT_DETAIL')
//                ->where('SIZE','like', '%'.$request[1].'%')
//                ->where('COLOR', '=', $request[2])
//                ->where('COLOR2', 'like', '%'.$request[3].'%')
//                ->Where('FINALPRODUCTNAME','like','%'.$request[0].'%')
//                ->where('MATERIAL','like','%'.$request[4].'%')
//                ->get();
//            return response()->json($productInfo);
//        }
//        else{ //?????? ???????????????
//            $productInfo = DB::table('PRODUCT_DETAIL')
//                ->where('SIZE','like', '%'.$request[1].'%')
//                ->where('COLOR', '=', $request[2])
//                ->where('COLOR2', 'like', '%'.$request[3].'%')
//                ->get();
////            $test = $productInfo->where('SIZE','=','?????????')->get();
//            return response()->json($productInfo);
//        }
        if($request->classify == null){
            \Log::info('1???');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->get();
            \Log::info($productInfo);
            return response()->json($productInfo);
        }
        else if($request->category == null){
            \Log::info($request);
            \Log::info('2???');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->where('PRODUCT_CLASSIFY.CLASSIFYNAME','=',$request->classify)
                ->get();
            \Log::info($productInfo);
            return response()->json($productInfo);
        }
        else if($request->productName == null){
            \Log::info('3???');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->where('PRODUCT_CLASSIFY.CLASSIFYNAME','=',$request->classify)
                ->where('PRODUCT.PRODUCTNAME','=',$request->category)
                ->get();
            \Log::info($productInfo);
            return response()->json($productInfo);
        }
        else {
            \Log::info('4???');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->where('PRODUCT_CLASSIFY.CLASSIFYNAME','=',$request->classify)
                ->where('PRODUCT.PRODUCTNAME','=',$request->category)
                ->orWhere('PRODUCT_DETAIL.FINALPRODUCTNAME','=',$request->productName)
                ->orWhere('PRODUCT_DETAIL.SIZE','=',$request->productName)
                ->orWhere('PRODUCT_DETAIL.SIZE','=',$request->productName)
                ->get();
            \Log::info($productInfo);
            return response()->json($productInfo);
        }

    }
    public function insertData(Request $request)
    {

        $tempArr = $request->insertDataArr;
        \Log::info($tempArr);
        foreach ($tempArr as $value) {
            \Log::info([$value[0]]);//productCode
            \Log::info([$value[1]]);//STORE NAME
            \Log::info([$value[2]]);//STORE ??????
            \Log::info([$value[3]]);//??????

            $storeCode = DB::table('STORE')
                ->where('STORENAME','=',$value[1])
                ->where('STORELOCATION','=',$value[2])
                ->select( 'STORECODE')
                ->get();
            DB::table('SALES_LOG')
                ->insert([
                    'SOLDDATE' => $value[3],
                    'STORECODE' => $storeCode[0]->STORECODE,
                    'FINALPRODUCTCODE' => $value[0]
                ]);

        }

    }

    public function deleteLog(Request $request)
    {
        \Log::info($request);
        $productInfo = DB::table('SALES_LOG')
            ->where('SALECODE', '=', $request[0])
            ->delete();
    }

}
