<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingoutController extends Controller
{
    public function index(){
        auth()->logout();
    }
}
