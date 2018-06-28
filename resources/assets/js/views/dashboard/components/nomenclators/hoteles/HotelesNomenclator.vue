<template>
    <div>
        <el-form ref="form" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                  <el-col :span="11">
                    <FormItem
                       label="Nombre del hotel:"
                       type="text"
                       name="name"
                       :model="model"
                     />
                  </el-col>
                  <el-col :span="11">
                     <FormItem
                        label="Telefono:"
                        type="text"
                         name="telephone"
                        :model="model"
                      />
                  </el-col>
                  <el-col :span="22">
                    <FormItem
                       label="Dirección"
                       type="text"
                       name="address"
                       :model="model"
                     />
                     <FormItem
                         label="Banco"
                         type="select"
                         name="bank"
                         :options="bank.items"
                        :model="model"
                      />
                  </el-col>
                </el-col>

                <el-col :span="11">
                  <el-col :span="11">
                    <FormItem
                       label="Categoría:"
                       type="select"
                       name="category"
                       :options="category"
                       :model="model"
                    />
                    <FormItem
                       label="Email"
                       type="text"
                       name="email"
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
                        label="Código"
                        type="text"
                        name="code"
                        :model="model"
                      />
                   </el-col>
                </el-col>
            </el-row>
            <el-row style="margin-top: 20px;">
                <el-col>
                  <el-form-item class="button-container">
                      <el-button @click="createNew" type="primary">Nuevo</el-button>
                      <el-button @click="save">Guardar</el-button>
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
                        width="200"/>
                <el-table-column
                        prop="item.address"
                        label="Dirección"
                          width="400"
                      />
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
                        width="250"/>
                <el-table-column
                        prop="item.code"
                        label="Código"
                        width="200"/>
                <el-table-column
                        prop="item.category"
                        label="Categoría"
                        width="100"/>
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
    export default Vue.component('HotelesNomenclator', {
      data:function(){
        return {
          model:{
            id:"",
            name:"",
            telephone:"",
            bank:"",
            email:"",
            code:"",
            address:"",
            fax:"",
            category:""
          },
          category:[{
            label:"1",
            value:"1"
          },{
            label:"2",
            value:"2"
          },{
            label:"3",
            value:"3"
          },{
            label:"4",
            value:"4"
          },{
            label:"5",
            value:"5"
          }],
        }
      },
      computed:{
         ...mapState(['hotel','bank'])
      },
      created(){
        this.newHotel = Object.assign({},this.model)
        this.$store.dispatch('get',['hotel']);
        this.$store.dispatch('get',['bank']);
      },
      mounted(){

      },
      methods:{
        handleCurrentRow(row){
          this.model = Object.assign(this.model,row.item);
          let actualSelect = _.filter(this.bank.items,{defaultValue:row.item.bank_id});
          this.model.bank = actualSelect[0].value;
            // this.$store.dispatch('selectedrow',['contractList',row]);
        },
        save(){
            this.$store.dispatch('save',['hotel',this.model])
        },
        createNew(){
          this.model = this.newHotel ;
        }
      }

    })
</script>
<style>
</style>
