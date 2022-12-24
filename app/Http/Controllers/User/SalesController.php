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

class SalesController extends Controller
{    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //페이지별로 펑션제작 1.메인 2.수정페이지 3. 작성페이지 등 (단, 여기서는 보여주는 페이지 뿐이라 메인만 있음)
    public function main(Request $request){

    }
    //
    public function getSalesData(Request $request){
        $salesLog = Sale_Log::with(['productLastSalesLog'])->where('FINALPRODUCTCODE',$request->no)->orderBy('SOLDDATE','DESC')->get();
        return response()->json($salesLog);

    }
    public function getSalesTimelineData(Request $request){
//        $salesLog = Sale_Log::with(['productLastSalesLog'])->where('FINALPRODUCTCODE',$request->no)->groupBy('STORECODE')->orderBy('SOLDDATE','DESC')->get();
        $groupStoreCode = Sale_Log::with(['productLastSalesLog'])->groupBy('STORECODE')->get('STORECODE');

        $groupStoreInfoArr = [];
        foreach($groupStoreCode as $k){
            $groupStoreCnt = Sale_Log::where('STORECODE',$k->STORECODE)->count();//group by count



            $groupStoreInfo = STORE::where('STORECODE',$k->STORECODE)->first(); //스토어정보
            $groupStoreInfo['STORECNT'] = $groupStoreCnt;

            array_push($groupStoreInfoArr,$groupStoreInfo);

        }


//        \Log::info([$groupStoreInfoArr]);
        return response()->json($groupStoreInfoArr);
    }

}
