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
            ->orderBy('SALES_LOG.SOLDDATE','DESC')->get();
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
        if($request->classify == null){
            \Log::info('1번');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->get();
            \Log::info($productInfo);
            return response()->json($productInfo);
        }
        else if($request->category == null){
            \Log::info($request);
            \Log::info('2번');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->where('PRODUCT_CLASSIFY.CLASSIFYNAME','=',$request->classify)
                ->get();
            \Log::info($productInfo);
            return response()->json($productInfo);
        }
        else if($request->productName == null){
            \Log::info('3번');
            \Log::info($request->classify);
            \Log::info($request->category);
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
            \Log::info('4번');
            $productInfo = DB::table('PRODUCT_DETAIL')
                ->join('PRODUCT', 'PRODUCT_DETAIL.PRODUCTCODE', '=', 'PRODUCT.PRODUCTCODE')
                ->join('PRODUCT_CLASSIFY', 'PRODUCT.CLASSIFYCODE', '=', 'PRODUCT_CLASSIFY.CLASSIFYCODE')
                ->where('PRODUCT_DETAIL.FINALPRODUCTNAME','=',$request->productName)
                ->orwhere('PRODUCT_DETAIL.SIZE','=',$request->productName)
                ->orwhere('PRODUCT_DETAIL.MATERIAL','=',$request->productName)
                ->orderByDesc('PRODUCT.PRODUCTNAME')
                ->orderByDesc('PRODUCT_DETAIL.SIZE')
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
            \Log::info([$value[2]]);//STORE CODE
            \Log::info([$value[1]]);//STORE 지점
            \Log::info([$value[3]]);//날짜

            DB::table('SALES_LOG')
                ->insert([
                    'SOLDDATE' => $value[3],
                    'STORECODE' => $value[2],
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


    public function loadStoreList(Request $request)
    {
        //백화점 선택
        $storeList = STORE::get();

        return response()->json($storeList);
    }


}
