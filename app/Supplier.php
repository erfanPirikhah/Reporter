<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'nameSupplier', 'description', 'number_phone','created_at'
    ];


    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }

    public function scopeSearch($query,$key)
    {
        $query->where('nameSupplier','LIKE','%'.$key.'%')
        ->Orwhere('number_phone','LIKE','%'.$key.'%');
        return $query;
    }
}
