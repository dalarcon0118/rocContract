<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base\Agency;

class AgencyController extends Controller
{
    function getAll(Request $request){
        $agency  = Agency::all();
        return $agency->toJson();
    }
    //
}
