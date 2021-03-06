<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Family\Entities\Family;
use Modules\Marriage\Entities\Marriage;
use Modules\Birth\Entities\Birth;
use Modules\Death\Entities\Death;
use Modules\Divorce\Entities\Divorce;
use Modules\Divorce\Entities\ReturnDetail;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\State;
use Modules\Address\Entities\District;
use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function verify()
    {
        return redirect()->route('admin.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lgaDashboard($state,$lga, $lga_id)
    {
        $lga = Lga::find($lga_id);
        return view('admin::Admin.lgaDashboard',['lga'=>$lga]);
    }

    public function stateDashboard($state,$state_id)
    {
        $state = State::find($state_id);
        return view('admin::Admin.stateDashboard',['state'=>$state]);
    }

    public function districtDashboard($state,$lga,$dist,$id)
    {
        return view('admin::Admin.districtDashboard',['district'=>District::find($id)]);
    }
    
    public function index()
    {
        if(admin()->state){
            return redirect()->route('state.dashboard',[
                admin()->state->name,
                admin()->state->id
            ]);
        }elseif(admin()->lga){
            return redirect()->route('lga.dashboard',[
                admin()->lga->state->name,
                admin()->lga->name,
                admin()->lga_id
            ]);
        }elseif(admin()->district){
            return redirect()->route('district.dashboard',[
                admin()->district->lga->state->name,
                admin()->district->lga->name,
                admin()->district->name,
                admin()->district->id,
            ]);
        }
        return view('admin::Admin.dashboard',['states' => State::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::Admin.Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
          'name'          => 'required',
          'email'         => 'required',
          'password'      => 'required'
        ]);
        // store in the database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password=bcrypt($request->password);
        $admins->save();
        return redirect()->route('admin.auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
