<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table="blog";
    protected $fillable = [
        'title', 'sologan', 'description','image',
    ];
}