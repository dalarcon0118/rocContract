<template>
    <div>
        <el-form ref="form" :model="form" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                  <el-col :span="11">
                    <FormItem
                       label="Nombre"
                       type="text"
                       name="name"
                       :model="model"
                     />
                  </el-col>
                  <el-col :span="11">
                     <FormItem
                        label="Metodo pago:"
                        type="select"
                        name="payment_method_id"
                        :options="payment.items"
                        :model="model"
                      />
                  </el-col>
                  <el-col :span="22">
                    <FormItem
                       label="Dirección:"
                       type="text"
                       name="address"
                       :model="model"
                     />
                  </el-col>
                  <el-col :span="11">
                    <FormItem
                        label="Movil:"
                        name="telephone"
                       :model="model"
                     />
                  </el-col>
                  <el-col :span="11">
                    <FormItem
                        type="text"
                        label="Moneda:"
                        name="currency"
                       :model="model"
                     />
                  </el-col>
                </el-col>

                <el-col :span="11">
                  <el-col :span="11">
                    <FormItem
                       label="Zip:"
                       type="text"
                       name="zip_code"
                       :model="model"
                    />
                    <FormItem
                       label="Correo:"
                       type="text"
                       name="email"
                       :model="model"
                     />
                     <FormItem
                        label="Pais:"
                        type="text"
                        name="country"
                        :model="model"
                      />
                  </el-col>
                  <el-col :span="11">
                    <FormItem
                       label="Fax:"
                       type="text"
                       name="fax"
                       :model="model"
                     />
                     <FormItem
                        label="Código:"
                        type="text"
                        name="code"
                        :model="model"
                      />
                      <FormItem
                         label="Ciudad:"
                         type="text"
                         name="city"
                         :model="model"
                       />
                   </el-col>
                </el-col>
            </el-row>
            <el-row style="margin-top: 20px;">
                <el-col>
                  <el-form-item class="button-container">
                      <el-button @click="add" type="primary">Nuevo</el-button>
                      <el-button @click="save"  >Guardar</el-button>
                  </el-form-item>
                </el-col>
            </el-row>
        </el-form>
        <el-row :gutter="20" class="center-section">
          <el-col :span="22">
            <el-table
                    class="table"
                    :data="agency.items"
                    highlight-current-row
                    ref="contractList"
                    @current-change="handleCurrentRow"
                    height="250">
                <el-table-column
                        fixed
                        prop="item.name"
                        label="Nombre"
                        width="100"/>
                <el-table-column
                        fixed
                        prop="item.country"
                        label="Pais"
                        width="100"/>
              <el-table-column
                        fixed
                        prop="item.city"
                        label="Pais"
                        width="100"/>
                <el-table-column
                        prop="item.address"
                        label="Dirección"
                        width="250"/>
                <el-table-column
                        prop="item.telephone"
                        label="Teléfono"
                        width="180"/>
                <el-table-column
                        prop="item.fax"
                        label="Fax"
                        width="200"/>
                <el-table-column
                        prop="item.email"
                        label="Email"
                        width="120"/>
                <el-table-column
                        prop="item.code"
                        label="Código"
                        width="200"/>
            </el-table>
          </el-col>
        </el-row>
    </div>
</template>
<script>
    import Vue from 'vue';
    import FormItem from '../../../../../ui/base/formItem';
    import FieldSet from '../../../../../ui/base/FieldSet';
    import {mapState} from 'vuex';
    export default Vue.component('AgencyNomenclator', {
      data:function(){
        return {
          hotels:"",
          model:{
            address:"",
            payment_method_id:"",
            name:"",
            code:"",
            telephone:"",
            fax:"",
            email:"",
            currency:"",
            country:"",
            city:"",
            zip_code:""
          }
        }
      },
      computed:{
        ...mapState(['payment','agency'])
      },
      created() {
        //do something after creating vue instance
        this.$store.dispatch('get',['payment']);
        this.$store.dispatch('get',['agency']);
      },
      methods:{
        add(){
          console.log(this);
        },
        save(){

        },
        handleCurrentRow(row){
            this.model = Object.assign(this.model,row.item);
            let actualSelect = _.filter(this.payment.items,{defaultValue:row.item.payment_method_id});
             this.model.payment_method_id = actualSelect[0].value;
            console.log(this.model);
            // this.model.pointer(row)
            }
        }

    })
</script>
<style>
</style>
