<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'employees';


    protected $fillable = [
        'employee_code',
        'name',
        'username',
        'password',
        'mobile',
        'alt_mobile',
        'birth_date',
        'start_work',
        'leave_balance',
        'branch_id',
        'weekly_rest_id',
        'job_grade_id',
        'created_by',
        'updated_by',
    ];


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


    public function weeklyRest()
    {
        return $this->belongsTo(WeeklyRest::class, 'weekly_rest_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function UpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function JobGrade()
    {
        return $this->belongsTo(JobGrade::class, 'job_grade_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'start_work' => 'date',
            'password' => 'hashed',
        ];
    }
}