<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'nameSupplier', 'description', 'number_phone',
    ];
}
