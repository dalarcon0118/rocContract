<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base\Price;
use function MongoDB\BSON\toJSON;

class PriceController extends Controller
{
    //
    public function getAll(Request $req){
        return Price::with(['hotelroom'
       =>function ($query) {
                $query->with('nomenclador');
        },
            'nomenclador'=>function ($query) {
                $query->where('description', 'id');
            },
            'discounts',
            'supplements'
        ])->where('contract_id',6)->get()->toJSON();
        //get()->forPage(1,10)->toJson();
    }
}
