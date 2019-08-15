<?php

namespace Modules\Education\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;
use Modules\Education\Entities\Admitted;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $admissions = [];
        foreach(teacher()->school->admitteds as $admission){
            if($admission->year == date('Y')){
                $admissions[] = $admission;
            }
        }
        return view('education::Education.School.Admission.index',['admissions'=>$admissions]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('education::Education.School.Admission.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile_id'=>'required',
            'admission_no'=>'required'
        ]);
        //is this profile exist
        $profile = Profile::find($request->profile_id);
        if($profile){
            $profile->admitteds()->create([
                'school_id'=>teacher()->school->id,
                'admission_no' => $request->admission_no,
                'year' => date('Y'),
                'teacher_id' => teacher()->id
            ]);
            session()->flash('message','Congratulation the admission is created success fully');
        }else{
            session()->flash('error',['Invali Student Profile ID']);
        }
        return redirect()->route('education.school.admission.index',[date('Y')]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $year, $admission_id)
    {
        $request->validate([
            'profile_id'=>'required',
            'admission_no'=>'required'
        ]);
        //is this profile exist
        $profile = Profile::find($request->profile_id);
        if($profile){
            Admitted::find($admission_id)->update([
                'school_id'=>teacher()->school->id,
                'admission_no' => $request->admission_no,
                'year' => date('Y'),
                'teacher_id' => teacher()->id
            ]);
            session()->flash('message','Congratulation the admission is updated success fully');
        }else{
            session()->flash('error',['Invali Student Profile ID']);
        }
        return redirect()->route('education.school.admission.index',[date('Y')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($year, $admission_id)
    {
        Admitted::find($admission_id)->delete();
        session()->flash('message','Congratulation the admission is deleted success fully');
        return redirect()->route('education.school.admission.index',[date('Y')]);
    }
}