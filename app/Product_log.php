<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User as UserEloquent;
use App\Product as ProductEloquent;

class Product_log extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'product_id', 'act', 'amount'
    ];

    public  function user(){
        return $this->belongsTo(UserEloquent::class);
    }

    public  function product(){
        return $this->belongsTo(ProductEloquent::class);
    }

}
