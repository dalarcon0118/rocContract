
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
import  {formarStrValue,formatValuetoStr,formatDate} from '../views/dashboard/util';
import {getContract,getAgency,get,save,totalCount,apiCreateContract,getfromContract,generateModel} from '../api/home';
export default new Vuex.Store({
    state:{
        activeTab:"1",
        indexTab:1,
        contractTableList:{
            currentPage:1,
            totalCount:0,
            querysearch:"",
        },
        release:0,
        contract:[],
		    tabs:[],
        hotel:{
          items:[],
          value:null,
        },
        discount:{
            items:[],
            value:null,
        },
        agency:{
            items:[],
            value:null,
        },
        coin:{
            items:[],
            value:null,
        },
        payment:{
          items:[],
          value:null,
        },
        market:{
            items:[],
            value:null,
        },
        agency:{
            items:[],
            value:null,
        },
        season:{
          value:"",
          items:[]
        },
        market:{
            value:"",
            items:[]
        },
        hotelRoom:{
            value:"",
            items:[]
        },
        supplement:{
            value:"",
            items:[]
        },
        mandatorysuplement:{
            value:"",
            items:[]
        },
        bank:{
            value:"",
            items:[]
        },
        newContract:{
            contractNbr:0,
            ref:"",
            startDate:"",
            market:"",
            endDate:"",
            periodContrac:{
                startdDate:"",
                endDate:""
            },
            hotel:"",
            days:"",
            coin:"",
            price:{
                startDate:"",
                endDate:"",
                typeRoom:"",
                release:0,
                supply:"",
                price:0,
                discount:"",
                discountPrice:""
            },
            mandatorySupplem:{
                value:"",
                idSuplement:"",
                personKind:"",
                valueType:''
            },
            specialConditions:{
                category:"",
                categoryId:"",
                specialCond:"",
                specialCondId:""
            },
            lawFrame:{},
            lawFrameArr:[],
            mandatorySupplemArr:[],
            priceArr:[],
            specialConditionsArr:[]
        },


        generalcondition:{
            items:[]
        },
        selecteds:{},
    },
    actions:{
        removeTab(st,tab){
            st.state.tabs.forEach((item,index)=>{
               if(item.name==tab) {
                   st.state.tabs.splice(index, 1);
               }
            })
            //console.log(tab)
        },
        clickMenu(store,action){
          store.state.activeTab = ++ store.state.indexTab+'';
          switch (action) {
            case 'hotel':
               store.state.tabs.push({title:'Hotel',name:store.state.activeTab,type:action})
              break;
              case 'bank':
                 store.state.tabs.push({title:'Bancos',name:store.state.activeTab,type:action})
              break;
              case 'coins':
                 store.state.tabs.push({title:'Divisas',name:store.state.activeTab,type:action})
              break;
              case 'agency':
                 store.state.tabs.push({title:'Agencias',name:store.state.activeTab,type:action})
              break;
              case 'season':
                 store.state.tabs.push({title:'Temporadas',name:store.state.activeTab,type:action})
              break;
              case 'market':
                 store.state.tabs.push({title:'Mercados',name:store.state.activeTab,type:action})
              break;
              case 'specialsConditions':
                 store.state.tabs.push({title:'Condiciones Especiales',name:store.state.activeTab,type:action})
              break;
              case 'generalConditions':
                 store.state.tabs.push({title:'Condiciones Generales',name:store.state.activeTab,type:action})
              break;
            default:

          }
        },
        getContractTotalCount(store){
            totalCount().
                then((resp)=>{
                store.state.contractTableList.totalCount =resp.data;
                store.state.newContract.contractNbr = resp.data;
            })
        },

        selectedrow(st,arg){
            st.state.selecteds[arg[0] ] =  arg[1];
        },

        editRow(st,arg){
            let row = st.state.selecteds[arg[0]];
            let model = Object.assign(st.state.newContract,row);
            switch (arg[0]){
                case 'contractList':
                    getfromContract('price',{contractID:row.id})
                        .then((resp)=>{
                            let price = resp.data;
                            price.forEach((item,index)=>{
                                model.priceArr.push({
                                    roomID: formatValuetoStr(item.hotel_room_id,item.hotelroom.nomenclador.name_es),
                                    roomLabel:item.hotelroom.nomenclador.name_es,
                                    periode:formatDate(item.start_date) + "-" + formatDate(item.end_date),
                                    periodeValue: {startDate:item.start_date,endDate:item.end_date},
                                    service:'Precio CP',
                                    price:item.price,
                                    release:item.release_days
                                })
                                item.supplements.forEach((suppl,index)=>{
                                    model.priceArr.push({
                                        roomID: formatValuetoStr(item.hotel_room_id,item.hotelroom.nomenclador.name_es),
                                        roomLabel:item.hotelroom.nomenclador.name_es,
                                        periode:formatDate(item.start_date) + "-" + formatDate(item.end_date),
                                        periodeValue: {startDate:item.start_date,endDate:item.end_date},
                                        service:suppl.nomenclador.name_es,
                                        price:suppl.value,
                                        release:item.release_days
                                    })
                                })
                                item.discounts.forEach((discount,index)=>{
                                    model.priceArr.push({
                                        roomID: formatValuetoStr(item.hotel_room_id,item.hotelroom.nomenclador.name_es),
                                        roomLabel:item.hotelroom.nomenclador.name_es,
                                        periode:formatDate(item.start_date) + "-" + formatDate(item.end_date),
                                        periodeValue: {startDate:item.start_date,endDate:item.end_date},
                                        service:discount.nomenclador.name_es,
                                        serviceID:discount.id,
                                        price:discount.value,
                                        release:item.release_days
                                    })
                                })
                            });
                            st.state.newContract.priceArr = model.priceArr;
                            st.dispatch('openContract')
                        })

                    getfromContract('mandatorySupplemt',{contractID:row.id})
                        .then((resp)=>{
                            let mandatorySupply = resp.data;
                            mandatorySupply.forEach((item,index)=>{
                                model.mandatorySupplemArr.push({
                                    supp:item.nomenclador.name_es,
                                    suppId: formatValuetoStr(item.nomenclador.id,item.nomenclador.name_es),
                                    value:item.value,
                                    personKind:item.mandatorysuppdiscounts.length>0? item.mandatorysuppdiscounts[0].nomenclador.name_es : "",
                                    valueType:item.mandatorysuppdiscounts.length>0? item.mandatorysuppdiscounts[0].value: "",
                                    personKindId:item.mandatorysuppdiscounts.length>0? formatValuetoStr(item.mandatorysuppdiscounts[0].nomenclador.id,item.mandatorysuppdiscounts[0].nomenclador.name_es) : 0

                                })
                                st.state.newContract.mandatorySupplemArr = model.mandatorySupplemArr;
                            });
                        })
                    getfromContract('specialconditions',{contractID:row.id})
                        .then((resp)=>{
                            let specialConditions = resp.data;
                            specialConditions.forEach((item,index)=>{
                                let model = Object.assign({},st.state.newContract.specialConditions)
                                model.category = item.specialcondition.nomenclador.name_es
                                model.categoryId = formatValuetoStr(item.specialcondition.nomenclador.id,
                                    item.specialcondition.nomenclador.name_es);
                                model.specialCond = item.specialcondition.name_es;
                                model.specialCondId = item.specialcondition.id;
                                st.state.newContract.specialConditionsArr.push(model)
                            });
                        })
                break;
            }

        },

        createServerContract(store){
            let contract = Object.assign({},store.state.newContract);
            contract.hotel = formarStrValue(contract.hotel,0);
            contract.market = formarStrValue(contract.market,0);
            contract.coin = formarStrValue(contract.coin,0);
            apiCreateContract(contract).
                then((resp)=>{
                console.log(resp)
            })

        },

        getContract(){
            var me = this;
            getContract(this.state.contractTableList.currentPage,this.state.contractTableList.querysearch).
            then((resp)=>{
               generateModel(resp,me);

            })
        },

        set(store,arg_set){
            store.state[arg_set[0]]= arg_set[1];
        },
        save(store,arg_arr){
          let entity = arg_arr[0];
          let query = arg_arr[1]?arg_arr[1] : [];
          let state = store.state;
          save(entity,query).
          then((resp)=>{
              var result_ = resp.data;

          })
        },
        get(store,arg_arr){
            var me  = this;
            var state = store.state;
            var entity = arg_arr[0];
            var query = arg_arr[1]?arg_arr[1] : [];
            if(state[entity].items.length==0)
                get(entity,query).
                    then((resp)=>{
                    var result_ = resp.data;
                    if(entity == "hotelRoom" ){
                        let label = result_[0].nomenclador.name_es;
                        state[entity].items = [{
                            value: result_[0].nomenclador.id + "*-*"+label,
                            label: label
                        }]

                    }
                    else if(entity == "generalcondition" ){
                        result_.forEach((item,index)=> {
                            let agency = item.agency? item.agency.name : "";
                            let id_agencia = item.id_agencia? item.id_agencia : "";

                            state[entity].items.push({
                                agency:agency,
                                name:item.name,
                                agencyValue:agency? item.id_agencia + "*-*"+item.agency.name:"",
                                id_generalConditions : item.id,
                                id_agencia:id_agencia,
                                item:item
                            })
                        })
                    }
                    else
                        result_.forEach((item,index)=> {
                        let label = item.name? item.name :item.name_es;
                            state[entity].items.push({
                                value: item.id + "*-*"+label,
                                label: label,
                                defaultValue: item.id,
                                item
                            })
                    })
                })
        },
        getAgency(){
            var me  = this;
            getAgency().
            then((resp)=> {
               resp.data.forEach((item)=>{
                   let label = item.name? item.name :item.name_es;
                   me.state.agency.items.push({
                       value: item.id + "*-*"+label,
                       label: label,
                       defaultValue: item.id,
                       item:item
                   })
               })
            })
        },
        createContract(st){
            var title = "Nuevo contrato*";
            st.state.newContract.contractNbr =  st.state.newContract.contractNbr+1;
            st.state.activeTab = ++ st.state.indexTab+'';
            let empty_contract = Object.assign({},this.state.newContract)
            st.state.tabs.push({title:title,name:st.state.activeTab,type:'contract',newContract:empty_contract})
        },
        openContract(st){
            st.state.newContract.contractNbr =  st.state.newContract.contractNbr;
            var title = "Contrato nro " + st.state.newContract.contractNbr;

            st.state.tabs.push({title:title,name:st.state.newContract.contractNbr})
        }
    }
});
