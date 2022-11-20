<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Sale_Log;

class Store extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $connection = 'mysql';
    protected $table ='STORE';
    // 컬럼명
    protected $fillable = [
        'STORECODE',
        'STORENAME',
        'STORELOCATION',
        'STOREDETAIL_LOCATION',
        'WAITNGSPOT'
    ];


    public function salesLog(){

        return $this->hasOne(Sale_Log::class,'STORECODE','STORECODE');
    }

    public function intoProductDetailForschedule(){
            return $this->hasOne(Product_Detail::class,'FINALPRODUCTCODE','FINALPRODUCTCODE');
    }

}
