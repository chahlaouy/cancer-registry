<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::latest()->paginate(10);
        return [
            name => 'fghjjh',
            email => 'fghjjh'
        ];
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
            
        ]);
        return Patient::create([
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
        //
    }
}
