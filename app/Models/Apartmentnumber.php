<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartmentnumber extends Model
{
    protected $guarded = [];

    public function citys()
    {
        return $this->belongsTo(City::class,'matp','matp');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'maqh','maqh');
    }
    public function wards()
    {
        return $this->belongsTo(Wards::class,'xaid','xaid');
    }
}
