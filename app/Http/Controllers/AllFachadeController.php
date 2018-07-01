<?php

namespace App\Http\Controllers;

use App\Models\Base\Mandatorysupplement;
use App\Models\base\Price;
use Illuminate\Http\Request;
use App\Models\base\Hotel;
use App\Models\base\Currency;
use App\Models\base\Market;
use App\Models\base\HotelRoom;
use App\Models\Base\Nomenclator;
use App\Models\base\Discount;
use App\Models\base\GeneralConditions;
use App\Models\base\MandatorySuppDiscount;
use App\Models\base\JurydicFrame;
use App\Models\base\Contract_specialcondition;
use App\Models\base\Bank;
use App\Models\base\Agency;
use App\Models\base\Season;

class AllFachadeController extends Controller
{
    public function all(Request $request,$entity){
        switch ($entity){
            case 'hotel':
                return Hotel::all()->toJson();
                break;
            case 'coin':
                return Currency::all()->toJson();
                break;
            case 'bank':
                return Bank::all()->toJson();break;
            case 'market':
                return  Market::all()->toJson();
                break;
            case 'hotelRoom':
                $criteria = $request->get("q");
                return HotelRoom::with(['nomenclador'])->where($criteria[0],$criteria[1])->get();
                break;
            case 'supplement':
                return Nomenclator::where('type','supp_type')->get();
                break;
            case 'discount':
                return Nomenclator::where('type','person_type')->get();
                break;
            case 'generalcondition':
                return GeneralConditions::with(['agency'])->get();
                break;
            case 'payment':
                return Nomenclator::where('type','payment_method')->get();
                break;
            case 'agency':
                return Agency::all()->toJson();
                break;
            case 'season':
                return Season::all()->toJson();
                break;
        }
    }
    public function save_all(Request $request,$entity){
      $params = $request->get("params");
      switch ($entity){
          case 'hotel':
              return Hotel::updateOrCreate();
              break;
          case 'coin':
              return Currency::all()->toJson();
              break;
          case 'bank':
              return Bank::all()->toJson();break;
          case 'market':
              return  Market::all()->toJson();
              break;
          case 'hotelRoom':
              $criteria = $request->get("q");
              return HotelRoom::with(['nomenclador'])->where($criteria[0],$criteria[1])->get();
              break;
          case 'supplement':
              return Nomenclator::where('type','supp_type')->get();
              break;
          case 'discount':
              return Nomenclator::where('type','person_type')->get();
              break;
          case 'generalcondition':
              return GeneralConditions::with(['agency'])->get();
              break;
          case 'agency':
                  return Agencias::with(['agency'])->get();
                  break;

      }
    }
    public function byCriteria($entity,$criteria){

        switch ($entity){
            case 'hotel':
                return Hotel::all()->toJson();
                break;
            case 'coin':
                return Currency::all()->toJson();
                break;
            case 'market':
                return  Market::all()->toJson();
                break;
            case 'hotelRoom':
                $criteria = json_decode($criteria);
                print_r($criteria);die;
                /*return HotelRoom::where($criteria)->with('nomenclador');*/
                break;
        }
    }

    public function fromContract($id,$entity){
        switch ($entity){
            case 'price':
                return Price::with(['hotelroom'=>function($query){
                    $query->with(['nomenclador']);
                },
                    'nomenclador',
                    'discounts'=>function($query){
                    $query->with(['nomenclador']);
                },
                    'supplements'=>function($query){
                    $query->with(['nomenclador']);
                }])
                    ->where('contract_id',$id)->get();
                break;
            case 'mandatorySupplemt':
                return Mandatorysupplement::with([
                    'nomenclador',
                    'mandatorysuppdiscounts'=>function($query){
                        $query->with(['nomenclador']);
                }
                ])
                    ->where('contract_id',$id)->get();
                break;
            case 'specialconditions':
                return Contract_specialcondition::with([
                    'specialcondition'=>function($query){
                        $query->with(['nomenclador']);
                    }
                ])
                ->where('contract_id',$id)->get();
                break;
            case 'generalCond':
                return JurydicFrame::with(['generalcondition'])
                    ->where('contract_id',$id)->get();
                break;
        }
    }
}
