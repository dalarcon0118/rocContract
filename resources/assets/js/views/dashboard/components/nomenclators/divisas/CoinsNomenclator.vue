<template>
    <div>
        <el-form ref="form" :model="model" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                          <el-col :span="22">
                              <FormItem
                                 label="Denominación:"
                                 type="text"
                                 name="name"
                                 :model="model"
                               />
                          </el-col>
                          <el-col :span="22">
                            <FormItem
                               label="Descripción (Opcional):"
                               type="text"
                               name="description"
                               :model="model"
                             />
                          </el-col>
                </el-col>
              <el-col :span="11">
                    <el-col :span="11">
                      <FormItem
                         label="Valor:"
                         type="text"
                         name="value"
                         :model="model"/>
                   </el-col>
                   <el-col :span="11">
                         <FormItem
                            label="Code:"
                            type="text"
                            name="code"
                            :model="model"/>
                  </el-col>
              </el-col>
            </el-row>
            <el-row style="margin-top: 20px;">
                <el-col>
                  <el-form-item class="button-container">
                      <el-button @click="create" type="primary">Nuevo</el-button>
                      <el-button @click="save">Guardar</el-button>
                  </el-form-item>
                </el-col>
            </el-row>
        </el-form>
        <el-row :gutter="20" class="center-section">
          <el-col :span="22">
            <el-table
                    class="table"
                    :data="coin.items"
                    highlight-current-row
                    @current-change="handleCurrentRow"
                    ref="contractList"
                    height="250">
                <el-table-column
                        fixed
                        prop="item.name"
                        label="Denomicación:"
                        width="250"/>
                <el-table-column
                        prop="item.code"
                        label="Código"
                        width="100"/>
                <el-table-column
                        prop="item.value"
                        label="Valor"
                        width="180"/>
                <el-table-column
                        prop="item.description"
                        label="Descripcion"
                        width="250"/>
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
    export default Vue.component('CoinsNomenclator', {
      data:function(){
        return {
          hotels:"",
          model:{
            code:"EUR",
            createdAt:"",
            description:null,
            id:0,
            name:"",
            updatedAt:"",
            value:""
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
        ...mapState(['coin'])
      },
      created() {
        //do something after creating vue instance
        this.$store.dispatch('get',['coin']);
        this.empty = Object.assign({},this.model)
      },
        methods:{
          create(){

          },
          save(){

          },
          handleCurrentRow(row){
              this.model =Object.assign({},row.item)
            }
        }

    })
</script>
<style>
</style>
