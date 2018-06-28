
import Axios from 'axios';
import {formatValuetoStr} from '../views/dashboard/util'

export const getContract = function (page,query) {
     return Axios.post('contract/get-all',{page:page?page:1,query:query});

}
export const getAgency = function () {
    return Axios.post('agency/get-all');

}
export const get = function(entity,criteria){
    return Axios.post("all/"+entity,{q:criteria});
}
export const save = function(entity,params){
  return Axios.post("save_all/"+entity,{params:params});
}
export const totalCount = function(){
    return Axios.post('contract/total');
}

export const apiCreateContract = function(data){
    return Axios.post('contract/create',{contract:data});
}

export const getfromContract = function($entity,id){
    return Axios.post('fromContract/'+id.contractID+"/"+$entity);
}
export const setModel = function(server,me){
    //let model = me.state.newContract;

    let model = Object.assign({},me.state.newContract);
    model.contractNbr = server.number;
    model.periodContrac.startdDate =  server.start_date;
    model.periodContrac.endDate =  server.end_date;
    model.status = server.status;
    model.market =  formatValuetoStr(server.market.id,server.market.name);
    model.marketLabel = server.market.name;
    model.hotel =  formatValuetoStr(server.hotel.id,server.hotel.name);
    model.hotelLabel = server.hotel.name;
    model.coin = formatValuetoStr(server.currency.id,server.currency.name);
    model.coinlabel = server.currency.name;
    model.ref = server.ref_number;
    model.id = server.id;
    model.days = server.dias_pago;
    /*

    getfromContract('generalCond',{contractID:model.id})
        .then((resp)=>{
            let price = resp.data;
            price.forEach((item,index)=>{
                model.priceArr.push({
                    roomID: formarValuetoStr(nc_pr.typeRoom,0),
                    periodeValue: {},
                    serviceID:nc_pr.supply? formarValuetoStr(nc_pr.supply,0):formarValuetoStr(nc_pr.discount,0) ,
                    price:nc_pr.price ? nc_pr.price : nc_pr.discountPrice,
                    release:nc_pr.release

                })
            });
        })*/
    return model;
}


export const generateModel = function(resp,me){
    me.state.contract = [];
    let data = resp.data;
    if(!resp.data['forEach'])
    {
        for(let prop in data){
            me.state.contract.push(setModel( data[prop],me))
        }
    }
    else data.forEach(function (index) {
        me.state.contract.push(setModel( index,me))
    })
}
