<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobGrade extends Model
{
    use HasFactory;

    protected $table = 'job_grades';
    protected $fillable = [
        'name',
    ];
}