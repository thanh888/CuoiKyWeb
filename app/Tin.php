<?php

namespace App;
use App\Models\Tinimage;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
class Tin extends Model
{
    protected $table='tins';

    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(Tinimage::class,'tin_id');
    }
    
    public function userss()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function city()
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
    public function tinImage()
    {
        return $this->hasMany(Tinimage::class,'tin_id');
    }
}
