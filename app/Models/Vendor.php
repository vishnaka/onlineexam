<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Vendor extends Model
{
    use HasFactory;

    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

    public function orders(){
        return $this->belongsTo('App\Models\Order');
    }

    /**
     * Get the car's owner.
     */
    public function types()
    {
        return $this->hasOneThrough('App\Models\Service','App\Models\Type');
    }
}
