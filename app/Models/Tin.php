<?php

namespace App\Models;
use App\Models\Tinimage;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\User;

class Tin extends Model
{
    protected $table='tins';

    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(Tinimage::class, 'tin_id');
    }
    
    public function userss()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function InforUser()
    {
        return $this->belongsTo(InforUserPosting::class, 'inforuser_id', 'id');
    }
    public function need()
    {
        return $this->belongsTo(Need::class,'need_id', 'id');
    }
    public function quantitydaypost()
    {
        return $this->belongsTo(QuantityDayPost::class,'quantity_daypost_id', 'id');
    }
    public function housingtype()
    {
        return $this->belongsTo(HousingType::class,'housingtype_id','id');
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
