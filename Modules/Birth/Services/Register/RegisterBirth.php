<?php

namespace Modules\Birth\Services\Register;

use Modules\Family\Services\Birth\birthCore;

use Modules\Birth\Services\Register\Validation\ValidateBirthRequest as ValidateRequest;

use Modules\Birth\Services\Register\NewBirth;

use Modules\Birth\Events\NewBirthEvent;

use Illuminate\Http\Request;

use Modules\Birth\Http\Requests\NewBirthFormRequest;

trait RegisterBirth
{
	use ValidateRequest;

	public function index(birthCore $birth)
    {
        return view('birth::Birth.new_birth',['father'=>$birth->father,'mothers'=>$birth->mothers,'families'=>$birth->families,'status'=>$birth->status]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('birth::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(NewBirthFormRequest $request)
    {
        $birth = new NewBirth($request->all());
        if(session('error') == null){
        	//broadcast(new NewBirthEvent($birth->data))->toOthers();
            session()->forget('family');
            session()->flash('message','Birth is registered successfully');
            return back()->withSuccess('Brith is registered successfully');
        }
            return back()->withIput();
    }

    public function verify(Request $request)
    {
        $request->validate([
            'family' => 'required'
        ]);
        session(['family'=> $request->all()]);
        return back();
    }

}