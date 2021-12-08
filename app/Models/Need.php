<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $guarded=[];
    protected $table= 'needs';
    public function needChild()
    {
        return $this->hasMany(Need::class, 'parent_id');
    }
    // public function hasPosting()
    // {
    //     return $this->hasMany(Tin::class, 'need_id');
    // }
}
