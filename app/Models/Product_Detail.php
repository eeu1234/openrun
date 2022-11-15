<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product_Detail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $connection = 'mysql';
    protected $table ='PRODUCT_DETAIL';
    // 컬럼명
    protected $fillable = [
        'FINALPRODUCTCODE',
        'FINALPRODUCTNAME',
        'SEASONCHECK',
        'SIZE',
        'COLOR',
        'COLOR2',
        'PATTERN',
        'MATERIAL',
        'IMG',
        'PRODUCTCODE'
    ];

}
