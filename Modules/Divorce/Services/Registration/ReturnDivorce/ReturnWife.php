<?php

namespace Modules\Divorce\Services\Registration\ReturnDivorce;

use App\User;
/**
* this class will return the wife the user has divorce back to active wife in the family
*/
class ReturnWife
{
	
	protected $wife;
    public $error = [];
	function __construct($data)
	{
		$this->husband = Auth()->User()->profile->husband;
		$this->data = $data;
		$this->validate ();
		$this->return ();
	}

	protected function return ()

	{
        if ($this->error == null) {
        	foreach($this->wife->marriages as $marriage){
	        	if($marriage->husband_id == $this->husband->id){
	        		$marriage->update(['is_active'=>1]);
	        		$marriage->divorce->update(['is_active'=>0]);
	        		foreach ($marriage->divorce->details as $detail) {
	        			if($detail->return == null){
	        			    $detail->return()->create(['date'=>strtotime($this->data['date'])]);
	        			}
	        		}
	        	    session()->flash('message','The divorce was returned successfully');
	        	}
	        }
        }else{
        	session()->flash('error',$this->error);
        }
	}

	protected function validate ()
	{
        $this->wife = User::find($this->data['first_name'])->profile->wife;
        foreach ($this->wife->marriages as $marriage) {
        	if ($this->husband->id == $marriage->husband_id && $marriage->divorce->date > strtotime($this->data['date'])) {
			    $this->error[] = 'Divorce date Authentication fails : the divorce date is greater than return date';
        	}
        }
	}
}