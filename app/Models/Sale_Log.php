<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Sale_Log extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $connection = 'mysql';
    protected $table ='SALES_LOG';
    // 컬럼명
    protected $fillable = [
        'SALECODE',
        'SOLDDATE',
        'STORECODE',
        'FINALPRODUCTCODE',
        'REMARK'
    ];


    public function intoStoreForschedule(){

        return $this->hasMany(Store::class,'STORECODE','STORECODE');
    }

    public function schedule(){
        return $this->hasManyThrough(Product_Detail::class, Store::class,
            'STORECODE','FINALPRODUCTNAME','FINALPRODUCTNAME','STORECODE');
    }

}
