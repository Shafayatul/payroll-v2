<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function department(){
        return $this->belongsTo(\App\Department::class, 'department_id');
    }

    public function payrollHistories(){
        return $this->hasMany(\App\PayrollHistory::class, 'user_id');
    }

    public function employeeDetails(){
        return $this->hasMany(\App\EmployeeDetail::class, 'user_id');
    }

    public function recuritingCategories(){
        return $this->hasMany(\App\RecuritingCategory::class, 'autoresponder_id');
    }

    public function boardingGroups(){
        return $this->belongsToMany(\App\BoardingGroup::class, 'employee_boarding_group', 'user_id', 'group_id');
    }
}
