<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base\Hotel;
class HotelController extends Controller
{
    //
    public function getAll(){
        return Hotel::all();
    }
}
