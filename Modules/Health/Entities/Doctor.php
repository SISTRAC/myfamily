<?php

namespace Modules\Health\Entities;

use Modules\Profile\Entities\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\Health\Services\Traits\DiagnoseAble;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable, DiagnoseAble;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'email',
        'phone', 
        'password',
        'hospital_id',
        'gender_id',
        'profile_id',
        'state_id',
        'discpline_id',
        'hospital_department_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function discpline()
    {
        return $this->belongsTo(Discpline::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function gender()
    {
        return $this->belongsTo('Modules\Profile\Entities\Gender');
    }

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function state()
    {
        return $this->belongsTo('Modules\Address\Entities\State');
    }

    public function hospitalDepartment()
    {
        return $this->belongsTo(HospitalDepartment::class);
    }
    
    public function hospitalAdmissions()
    {
        return $this->hasMany(HospitalAdmission::class);
    }

    public function onAdmission(Profile $profile)
    {
        $flag = false;
        
        foreach ($this->hospitalAdmissions as $admission) {
            
            if($admission->profile_id == $profile->id && $admission->dischargeAdmission == null){
                $flag = true;
            }
        }

        return $flag;
    }
}
