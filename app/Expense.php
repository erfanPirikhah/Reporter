<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'documentNumber', 'type_id', 'description','created_at'
    ];

    public function typeExpense()
    {
        return $this->belongsTo(typeExpense::class,'type_id','id');
    }


    public function scopeSearch($query,$key)
    {
        $query->where('documentNumber','LIKE','%'.$key.'%');

        return $query;
    }
}
