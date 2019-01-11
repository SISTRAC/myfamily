<?php

namespace Modules\Family\Services\Marriage;

use Modules\Family\Entities\Family;

use Modules\Family\Services\Family\ValidFamilies;

use Modules\Marriage\Entities\Status;

class marriageCore

{
	public $husbands = [];
	public $wives = [];
	public $family = [];
	public $families;
    public $status = [];
	public function __construct()
	{
        $this->marriageInfo(); 
	} 

	public function marriageInfo()

	{
		if(session('register')){
            $this->family = Family::find(session('register')['family']);
            $admin = $this->family->admin;
            switch (session('register')['status']) {
                case 'father':
                    $this->husbands = [
                        'name'=>$this->family->admin->profile->user->first_name,
                        'surname'=>$this->family->admin->profile->user->last_name,
                        'user_id' => $this->family->admin->profile->user->id
                    ];
                    break;
                case 'son':
                    foreach($admin->profile->husband->father->births->child->user as $child){
                        if($child->profile->gender_id == 1 && $child->profile->marital_status_id == 1){
                            $this->husbands = [
                            'name'=>$child->first_name,
                            'surname'=>$child->last_name,
                            'user_id' => $child->id
                            ];
                        }
                    }
                    break;
                case 'daughter':
                    foreach($admin->profile->husband->father->births->child->user as $child){
                        if($child->profile->gender_id == 2 && $child->profile->marital_status_id == 1){
                            $this->wives = [
                            'name'=>$child->first_name,
                            'surname'=>$child->last_name,
                            'user_id' => $child->id
                            ];
                        }
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
            //create array that will hold valid wife statuses
            $valid_status = [];
            $invalid_status = [];
            //if admin has married
            if($admin->profile->husband){
            	//get all his valid wife status and put in the array valid status
        		foreach ($admin->profile->husband->marriages as $marriage) {
	            	if($marriage->is_active == 1){
	            		$valid_status[] = $marriage->wife->status->id;
	            	}
	            }
            }
            
            foreach(Status::all() as $status){
            	if(!in_array($status->id,$valid_status)){
                    $invalid_status[] = $status->id;
            	}
            }
           
            foreach($invalid_status as $status_id){
               
            	$this->status[] = Status::find($status_id);
           
            }
         
        }else{
        	$family = new ValidFamilies();
            $this->families = $family->getAllFamilies();
        }
	}
}