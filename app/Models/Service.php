<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Vendor;

class Service extends Model
{
    use HasFactory;

    public function types(){
        return $this->hasMany('App\Models\Type');
    }

    public function vendors(){
        return $this->belongsToMany('App\Models\Vendor');
    }
}
