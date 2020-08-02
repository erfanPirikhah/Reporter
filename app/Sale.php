<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'buyerName', 'buyerCity', 'profit','sellerCode','buyerCode','phoneBuyer','commodity_id','price','created_at'
    ];

    public function commodities ()
    {
        return $this->belongsToMany(Commodity::class);
    }
}
