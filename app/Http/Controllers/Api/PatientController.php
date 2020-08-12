<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Tumeur;
use App\Hopital;
use App\Suivre;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with(['tumeurs', 'hopitals', 'suivres'])->get();
        return $patients;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom'      => 'required',
            'prenom'      => 'required',
            'profession'      => 'required',
            'sexe'      => 'required',
            'age'      => 'required',
            'adresse'      => 'required',
            'cin'      => 'required',
            'date_naissance'      => 'required',
            'lieu_naisance'      => 'required',
            'num_securite_sociale'      => 'required',
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
            'hopital'      =>  'required',
            'num_laboratoire'      =>  'required',
            'num_cas'      =>  'required',
            'unite'      =>  'required',
            'date_derniere_contact'      =>  'required',
            'statut'      => 'required',
        ]);
        $patient =  Patient::create([
            'nom'      =>  $request['nom'],
            'prenom'      =>  $request['prenom'],
            'profession'      =>  $request['profession'],
            'sexe'      =>  $request['sexe'],
            'age'      =>  $request['age'],
            'adresse'      =>  $request['adresse'],
            'cin'      =>  $request['cin'],
            'date_naissance'      =>  $request['date_naissance'],
            'lieu_naisance'      =>  $request['lieu_naisance'],
            'num_securite_sociale'      =>  $request['num_securite_sociale'],
            
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
            'patient_id'          => $patient->id
        ]);
        $hopital =  Hopital::create([
            'hopital'      =>  $request['hopital'],
            'num_laboratoire'      =>  $request['num_laboratoire'],
            'num_cas'      =>  $request['num_cas'],
            'unite'      =>  $request['unite'],
            'patient_id'          => $patient->id
        ]);
        $suivre =  Suivre::create([
            'date_derniere_contact'      =>  $request['date_derniere_contact'],
            'statut'      =>  $request['statut'],
            'patient_id'          => $patient->id
        ]);

        return $patient;
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
