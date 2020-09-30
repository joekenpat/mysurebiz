<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at', 'email_verified_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleAttribute($value)
    {
        if($value == 1)
        {
            return 'Student';
        }
        if($value == 2)
        {
            return 'Artisan';
        }
        if($value == 3)
        {
            return 'Employee';
        }
        if($value == 4)
        {
            return 'Admin';
        }
        return $value;
    }
    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

	/**
	 * @return float|int (in months)
	 */
    public function getLessonDurationAttribute()
    {
	    return $this->LessonDuration();
    }
    public function getLessonDurationDaysAttribute()
    {
    	return $this->LessonDuration('days');
    }

    public function LessonDuration($type = 'months')
    {
	    if($this->role === 1 && $this->period === 12){
		    return $type === 'days' ? 14 : 0.5;
	    }
	    if($this->role === 2 || $this->role === 3){
		    if($this->period === 6){
			    return $type === 'days' ? 7 : 0.25;
		    }
		    if($this->period === 12){
			    return $type === 'days' ? 14 : 0.5;
		    }
	    }
	    return $type === 'days' ? 30 : 1;
    }

    public function getUserPeriodInDays()
    {
    	$year = (int) $this->period/12;
    	$months = $this->period % 12;
    	$days = ($year *365) + ($months * 30);
    	return ceil($days);
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'course_id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'users_id');
    }

    public function artisans()
    {
        return $this->hasMany('App\Models\Artisan', 'users_id');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'users_id');
    }

    public function isStudent()
    {
        return ($this->role == "Student")?true:false;
    }
    public function isArtisan()
    {
        return ($this->role == "Artisan")?true:false;
    }
    public function isEmployee()
    {
        return ($this->role == "Employee")?true:false;
    }
    public function isPennywise()
    {
        return ($this->pennywise)?true:false;
    }
    public function isEmployeeFirst()
    {
        return ($this->isEmployee() && !$this->isPennywise())?true:false;
    }
    public function isAdmin(){
    	return $this->role === "Admin" ? true : false;
    }
    public function commencedTraining()
    {
    	return $this->batch_id ? true : false;
    }
}
