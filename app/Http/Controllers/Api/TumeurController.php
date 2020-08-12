<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Tumeur;

class TumeurController extends Controller
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
            'nom_tumeur'      =>  'required',
            'diagnostic_de_base'      => 'required',
            'topographie'      =>  'required',
            'morphologie'      =>  'required',
            'comportement_tumoral'      =>  'required',
            'differenciation_histologique'      =>  'required',
            'classification_TNM'      => 'required',
            'extension'      =>  'required',
            'siege_metastase'      =>  'required',
            'date_incidence'      =>  'required',
        ]);
        
        $tumor =  Tumeur::create([
            'nom_tumeur'      =>  $request['nom_tumeur'],
            'diagnostic_de_base'      =>  $request['diagnostic_de_base'],
            'topographie'      =>  $request['topographie'],
            'morphologie'      =>  $request['morphologie'],
            'comportement_tumoral'      =>  $request['comportement_tumoral'],
            'differenciation_histologique'      =>  $request['differenciation_histologique'],
            'classification_TNM'      =>  $request['classification_TNM'],
            'extension'      =>  $request['extension'],
            'siege_metastase'      =>  $request['siege_metastase'],
            'date_incidence'      =>  $request['date_incidence'],
            'patient_id'          => $id
        ]);
        

        return $tumor;
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
