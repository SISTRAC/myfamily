<?php

namespace Modules\Death\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Family\Services\Family\ValidFamilies;
use Modules\Family\Services\Family\ValidDeathNames;
use Modules\Death\Services\Registration\NewDeath as RegisterDeath;
use Modules\Death\Events\NewDeathEvent;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(ValidFamilies $family, ValidDeathNames $names)
    {

        return view('death::index',['families' => $family->families, 'names' => $names->names]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function verify(Request $request)
    {
        session(['death'=>$request->all()]);
        return redirect('/death');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($death = new RegisterDeath($request->all())){
            broadcast(new NewDeathEvent($death))->toOthers();
        }
        return redirect('/death');
    }


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        //
    }
}
