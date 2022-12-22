<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product_Detail;
use App\Models\Sale_Log;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //페이지별로 펑션제작 1.메인 2.수정페이지 3. 작성페이지 등 (단, 여기서는 보여주는 페이지 뿐이라 메인만 있음)
    public function main(Request $request)
    {
        $productInfo = DB::table('SALES_LOG')
            ->join('STORE', 'SALES_LOG.STORECODE', '=', 'STORE.STORECODE')
            ->join('PRODUCT_DETAIL', 'SALES_LOG.FINALPRODUCTCODE', '=', 'PRODUCT_DETAIL.FINALPRODUCTCODE')
            ->select('PRODUCT_DETAIL.FINALPRODUCTCODE', 'PRODUCT_DETAIL.COLOR','PRODUCT_DETAIL.COLOR2','PRODUCT_DETAIL.MATERIAL','SALES_LOG.SOLDDATE','STORE.STORENAME','STORE.STORELOCATION')
            ->where('PRODUCT_DETAIL.FINALPRODUCTCODE', $request->finalProductCode)
            ->orderBy('SALES_LOG.SOLDDATE','desc')
            ->get();

        return response()->json($productInfo);
    }
    public function getProductDetail(Request $request){
        $productInfo = [];
        $productInfo['productInfo'] = Product_Detail::with(['productName'])
            ->where('FINALPRODUCTCODE',$request->finalProductCode )
            ->first();

        $productInfo['productInfo']->salesLog = Sale_Log::with(['productLastSalesLog'])
            ->where('FINALPRODUCTCODE',$request->finalProductCode )
            ->orderBy("SOLDDATE","DESC")
            ->first();


        \Log::info([$productInfo]);
        //\Log::info($productLastSalesInfo);
        return response()->json($productInfo);
    }



    public function salesLog()
    {

        return view('salesList');
    }
    public function timelineLog()
    {

        return view('salesTimeline');
    }

    //Vue 에서 axios 호출에 값을 반환 해줄 메소드들을 선언함
     public function productMainImg()
    {

        return json();
    }



    //모델에서는 실제 데이터 처리작업을 정의함(dao 역할)
    public function model($request)
    {
        if($request->exec_mode == 'delete'){

        }
        else if($request->exec_mode == 'add'){

        }
        else if($request->exec_mode == 'modify'){

        }
        $user = Store::where('STORECODE', 1)->get('STORENAME');
        \Log::info([$user]);

        return view('product', ['user' => $user]);
    }
    //
}
