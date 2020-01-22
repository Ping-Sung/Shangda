<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User as UserEloquent;
use App\Material as MaterialEloquent;
use App\ProductQuantityDetail as ProductQuantityDetailEloquent;

class Material_log extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'material_id', 'act', 'amount',
    ];


    public function material(){
        return $this->belongsTo(MaterialEloquent::class);
    }

    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }

    public function productQuantityDetail(){
        return $this->belongsTo(ProductQuantityDetailEloquent::class);
    }
}