<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyHusbandInWifeFamily;

use App\User;

trait ValidHusband 
{
    use VerifyHusbandInWifeFamily;

    public function validateHusband()
    {

        if(filled($this->data['wife_email'])){
            if(filled($this->husbandUser) && filled($this->husbandUser->profile->husband)){
                $this->familyAuth();
                $this->husbandAuth($this->husbandUser);
            }

        }
        
        if(filled($this->husbandUser) && filled($this->husbandUser->profile->husband) && $this->data['wife_email'] != null){
            $this->familyAuth();
            $this->husbandAuth($this->husbandUser);
        }
     
        if(filled($this->husbandUser)){
            if($this->married($this->husbandUser)){
                $this->canMarryAgain($this->husbandUser);
            }
        }
        if(request()->route('status') == 'son' || request()->route('status') == 'father'){
            if($this->husbandUser != null && $this->husbandUser->profile != null && $this->husbandUser->profile->child != null){
                
            }else if(filled($this->husbandUser) && filled($this->husbandUser->profile->child)){
                $this->canMarry($this->husbandUser);
                $this->validBirth($this->husbandUser);
            }
        }else{
            if($this->husbandUser->isNotEmpty() && $this->husbandUser->profile->isNotEmpty() && $this->husbandUser->profile->child->isNotEmpty()){
                
            }else if(filled($this->husbandUser) && filled($this->husbandUser->profile->child)){
                $this->canMarry($this->husbandUser);
                $this->validBirth($this->husbandUser);
            }
        }
        

        if(request()->route('status') == 'son'){
            $this->emailAuth();
        }
        if($this->husbandUser == null){
            $this->husbandMarriageDateAuth($this->husbandUser);
        }

    }
}