<?php

namespace Modules\Security\Http\Controllers\Admin\Police;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Security\Entities\PoliceStationType;
use Modules\Security\Entities\PoliceStationCategory;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PoliceStationController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('security::Admin.PoliceStation.index',['stations'=>$this->availablePoliceStations()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('security::Admin.PoliceStation.create',[
        	'districts'=>$this->availableDistricts(),
        	'station_types'=>PoliceStationType::all(),
        	'station_categories'=>PoliceStationCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $station_type = PoliceStationType::find($data['police_station_type_id']);
        $police_station = $station_type->policeStations()->firstOrCreate([
            'name' => $data['name'],
            'police_station_type_id' => $data['police_station_type_id'],
            'police_station_category_id' => $data['police_station_category_id'],
        ]);
     
        $police_station->policeStationLocation()->firstOrCreate([
            'address' => $data['address'],
            'town_id' => $data['town_id'],
        ]);
        session()->flash('message','Police Station created successfully');
        return redirect()->route('admin.security.police.station.index');
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        //
    }
}
