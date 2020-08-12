<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hopital;


class HopitalController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            
            'hopital'      =>  'required',
            'num_laboratoire'      =>  'required',
            'num_cas'      =>  'required',
            'unite'      =>  'required',
            
        ]);
        
        
        $hopital =  Hopital::create([
            'hopital'      =>  $request['hopital'],
            'num_laboratoire'      =>  $request['num_laboratoire'],
            'num_cas'      =>  $request['num_cas'],
            'unite'      =>  $request['unite'],
            'patient_id'          => $id
        ]);

        return $hopital;
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
        
    }
}
