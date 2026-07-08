<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;
use App\Models\Subject;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'class_name',
    ];
}


