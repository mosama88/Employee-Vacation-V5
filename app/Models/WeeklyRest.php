<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeeklyRest extends Model
{

    use HasFactory;

    protected $table = 'weekly_rests';


    protected $fillable = [
        'name',
    ];
}