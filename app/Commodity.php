<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = [
        'nameCommodity', 'codeCommodity', 'Supplier_id','imageUrl','priceCommodity','status','created_at'
    ];

//    public function getStatusAttribute ()
//    {
//
//      return $this->status  ? 'موجود' : 'نامجود';
//    }
}
