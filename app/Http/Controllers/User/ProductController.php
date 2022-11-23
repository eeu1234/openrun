<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //페이지별로 펑션제작 1.메인 2.수정페이지 3. 작성페이지 등 (단, 여기서는 보여주는 페이지 뿐이라 메인만 있음)
    public function main()
    {

        return view('productView');
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