<?php

namespace Modules\Health\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Address\Entities\Town;
use Illuminate\Routing\Controller;
use Modules\Health\Entities\Hospital;
use Modules\Health\Entities\HospitalType;
use Modules\Health\Entities\HospitalCategory;
use Modules\Health\Services\Traits\HospitalAndDoctors as Hospitalized;

class HospitalController extends Controller
{
    use Hospitalized;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('health::Hospital.index',[
            'hospitals'=>$this->availableHospitals(),
            'towns'=>$this->newHospitalRegistrationTowns(),
            'hospital_types'=>HospitalType::all(),
            'hospital_categories'=>HospitalCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('health::Hospital.create',['towns'=>$this->newHospitalRegistrationTowns(),'hospital_types'=>HospitalType::all(),'hospital_categories'=>HospitalCategory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function register(Request $request)
    {
        $this->registerThisHospital($request->all());
        return redirect()->route('admin.health.hospital.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('health::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $hospital_id)
    {

        $this->updateThisHospital(Hospital::find($hospital_id), $request->all());
        return redirect()->route('admin.health.hospital.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteHospital($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        $hospital->hospitalLocation()->delete();
        foreach($hospital->doctors as $doctor){
            $doctor->delete();
        }
        $hospital->delete();
        session()->flash('message','Congratulation We successfully deleted hospital and all its doctors records');
        return redirect()->route('admin.health.hospital.index');
    }
    
}
