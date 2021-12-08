<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HousingType extends Model
{
    protected $guarded=[];
    public function hasPosting()
    {
        return $this->hasMany(Tin::class, 'housingtype_id');
    }
}
