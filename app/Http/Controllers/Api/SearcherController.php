<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;

class SearcherController extends Controller
{
    public function index($beginDate, $endDate){

        $patients = Patient::all();

        $count = count($patients);

        return $count;
    }
}
