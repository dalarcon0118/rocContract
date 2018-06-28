<?php

namespace App\Http\Controllers;

use App\Models\Base\MandatorySuppDiscount;
use App\Models\Base\Price;
use Illuminate\Http\Request;
use App\Models\Base\Contract;
use App\Models\Base\HotelRoom;
use App\Models\Base\Mandatorysupplement;
use App\Models\Base\Hotel;
use App\Models\Base\JurydicFrame;
class ContractController extends Controller
{
    //
    public function getAll(Request $request)
    {
        $page = $request->input('page');
        $query = $request->input('query');
        $contract = Contract::with(['agency','hotel','market','currency'])->orderBy('id','desc');
        if($query!="")
            $contract = $contract->where('number',$query);

        $contract=  $contract->get()->forPage($page,10);
        return $contract->toJson();
    }
    public function roomGetAll(Request $request){

        $Hotel = $request->get('hotel');
        return HotelRoom::with('nomenclador')->where('hotel_id',$Hotel);
    }
    public function total(Request $request)
    {
        $contract = Contract::all();
        return count($contract);
    }
    public function create(Request $request){
        $data_contract = $request->get('contract');
        $coin =$data_contract["coin"];
        $market = $data_contract["market"];
        $hotel = $data_contract["hotel"];
        $contractNbr = $data_contract["contractNbr"];
        $ref = $data_contract["ref"];
        $days = $data_contract["days"];
        $price = $data_contract["priceArr"];
        $mandatorySupplemArr= $data_contract["mandatorySupplemArr"];
        $generalCond = $data_contract["generalCondition"];
        $contract = new Contract();
        $contract->currency_id = $coin;
        $contract->market_id = $market;
        $contract->hotel_id = $hotel;
        $contract->ref_number = $ref;
        $contract->dias_pago = $days;
        $contract->number = $contractNbr;
        $contract->save();

        $contractId = $contract['id'];

        foreach ($price as $item ){
            $pric = new Price();
            $pric->contract_id = $contractId;
            $pric->hotel_room_id = int($item['roomID']);
            $pric->plan_id =$item["serviceID"];
            $pric->plan_id =$item["startDate"];
            $pric->start_date =$item["startDate"];
            $pric->end_date =$item["endDate"];
            $pric->release_days =$item["release"];
            $pric->save();
        }

        foreach ($mandatorySupplemArr as $item ){
            $ms = new Mandatorysupplement();
            $msD = new MandatorySuppDiscount();

            $ms->contract_id = $contractId;
            $ms->supp_type_id = $item['suppID'];
            $ms->value = $item['value'];
            $ms->value_type = 'P.P.N';
            $ms->save();

            $msD->person_type_id = $item['personKindID'];
            $msD->value = $item['value'];
            $msD->mandatory_supplement_id = $ms['id'];
            $msD->save();
            /*$msD->num_person = $mandatorySupplemArr['personCant'];*/
        }

        foreach ($generalCond as $item ){
            $lawFrame = new JurydicFrame();
            $lawFrame->contract_id = $contractId;
            $lawFrame->general_conditions_id =$item['general_conditions_id'];
            $lawFrame->save();
        }
        return $contractId;

    }
}
