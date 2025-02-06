<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'governorate_id',
    ];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}