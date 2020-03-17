<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Traits\HasPermissionsTrait;
use App\Traits\keyFunctionTrait;
use App\Traits\salaryTrait;

class User extends Authenticatable
{
    use Notifiable, keyFunctionTrait, salaryTrait, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'salary', 'employee_type', 'email', 'password', 'office_id', 'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company(){
        return $this->hasOne(\App\Company::class, 'user_id');
    }

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function departments(){
        return $this->belongsTo(\App\Department::class, 'department_id');
    }

    public function payrollHistories(){
        return $this->hasMany(\App\PayrollHistory::class, 'user_id');
    }

    public function employeeDetails(){
        return $this->hasMany(\App\EmployeeDetail::class, 'user_id');
    }

    public function recruitingCategories(){
        return $this->hasMany(\App\RecruitingCategory::class, 'autoresponder_id');
    }

    public function boardingGroups(){
        return $this->belongsToMany(\App\BoardingGroup::class, 'employee_boarding_group', 'user_id', 'group_id');
    }

    public function userAttendances(){
        return $this->belongsToMany(\App\Weekday::class, 'user_attendance', 'user_id', 'weekday_id')->withPivot('in_time', 'out_time', 'date', );
    }

    public function attendanceLists(){
        return $this->hasMany(\App\Attendance::class, 'user_id');
    }

    public function userAbsences(){
        return $this->belongsToMany(\App\Absence::class, 'user_absence', 'user_id', 'absence_id')->withPivot('reason', 'absence_from', 'absence_to');
    }

    public function absenceLists(){
        return $this->hasMany(\App\UserAbsence::class, 'user_id');
    }

    public function salaries(){
        return $this->hasMany(\App\Salary::class, 'user_id');
    }

    public function roles(){
        return $this->belongsToMany(\App\TemRole::class, 'users_tem_roles', 'user_id', 'role_id');
    }
}
