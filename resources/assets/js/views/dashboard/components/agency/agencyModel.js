class AgencyModel extends Object{
     constructor(){
         super();
         this.fields =['payment_method_id', 'code', 'name', 'address', 'zip_code', 'city', 'province', 'telephone', 'mobile', 'fax', 'email', 'web', 'country', 'locale', 'currency'];
         this.entity = "agency";
         this.items =[];
     }
     collection(){

     },
    map(){

    }
    add(model){

    }
}
export default AgencyModel;
