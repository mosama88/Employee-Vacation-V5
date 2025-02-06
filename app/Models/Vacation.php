<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacation extends Model
{
    use HasFactory;

    protected $table = 'vacations';
    protected $fillable = [
        'vacation_code',
        'type_vacation',
        'from',
        'to',
        'reasonse',
        'status',
        'employee_id',
        'created_by',
        'updated_by',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function UpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}