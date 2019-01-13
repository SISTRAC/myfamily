<?php

namespace Modules\Family\Services\Account;

use Illuminate\Support\Facades\Hash;

use Modules\Profile\Entities\Profile;

use Modules\Family\Entities\Family;

use App\User;

trait Admin 

{

	public $admin;

    public $profile;

    public $user;

	public function newAdmin(Profile $profile, Family $family){

    	$this->admin = $family->admin()->create(['profile_id'=>$this->profile->id]);
        $profile->update(['family_id'=>$family->id]);

    }

    public function newUser()
    {
        if(session('register') == 'father'){
        	if(empty($this->data['date'])){
	            $this->user = $this->registerer;
	        }else{
	            $this->user = User::firstOrCreate([
	                'first_name'=>$this->data['name'],
	                'last_name'=>$this->data['sname'],
	                'email'=>$this->data['email'],
	                'password'=>Hash::make($this->data['password']),
	                'phone'=>'',
	            ]); 
	        }
        }else{
        	$this->user = User::find($this->data['husband_first_name']);
        	$this->registerer = Auth()->User();
        }
        
    }
   
    public function newProfile(User $user)
    {
        if(session('register') == 'father'){
	        if(empty($this->data['date'])){
	            $this->data['date'] = $this->data['mdate'];
	        }
	    	$this->profile = $user->profile()->create([
	            'gender_id'         => 1,
	            'marital_status_id' => 1,
	            'date_of_birth' => strtotime($this->data['date']),
	            'family_id' =>$this->family->id
	        ]);
        }else{
            $this->profile = $this->user->profile;
        }
        
    }

    public function newAdminHandle()
    {   
    	
    	$this->newUser();
        $this->newProfile($this->user);
        $this->newAdmin($this->profile, $this->family);
    }
}