<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidHusband;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidWife;

use App\User;

trait ValidateRequest

{
    public $error = [];

    public $husbandUser;

    public $wifeUser;

    use ValidWife, ValidHusband;

    public function validateMarriageRequest(){
        switch (session('register')['status']) {
            case 'father':
                $this->husbandUser = User::find($this->data['user_id']);
                break;
            case 'son':
                $this->husbandUser = User::find($this->data['husband_first_name']);
                break; 
            default:
                if(filled($this->data['new_husband_email'])){
                    $this->husbandUser = User::where('email',$this->data['new_husband_email'])->get();
                }else{
                    $this->husbandUser = User::where('email',$this->data['husband_email'])->get();
                }
                break;
         } 

        $this->validateHusband();
        
        $this->wifeUser = User::where('email',$this->data['wife_email'])->get();

        $this->validateWife();
    }
}