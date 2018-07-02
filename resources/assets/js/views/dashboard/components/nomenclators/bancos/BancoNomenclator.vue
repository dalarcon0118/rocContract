<template>
    <div>
        <el-form ref="form" :model="model" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                          <el-col :span="22">
                            <FormItem
                               label="Nombre del banco:"
                               type="text"
                               name="name"
                               :model="model"
                             />
                          </el-col>
                          <el-col :span="11">
                              <FormItem
                                 label="Código (opcional)"
                                 type="text"
                                 name="code"
                                 :model="model"
                               />
                          </el-col>
                          <el-col :span="11">
                              <FormItem
                                 label="Número iban:"
                                 type="text"
                                 name="iban_nr"
                                 :model="model"
                               />
                          </el-col>
                          <el-col :span="22">
                            <FormItem
                               label="Referencia (Opcional):"
                               type="text"
                               name="reference"
                               :model="model"
                             />

                          </el-col>
                </el-col>

                <el-col :span="11">
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
                       label="Swift:"
                       type="text"
                       name="swift"
                       :model="model"
                     />
                   </el-col>
                   <el-col :span="11">
                     <FormItem
                        label="Beneficiario:"
                        type="text"
                        name="beneficiary"
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
                    :data="bank.items"
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
                        width="250"
                      />
                <el-table-column
                        prop="item.iban_nr"
                        label="Número iban"
                        width="180"/>
                <el-table-column
                        prop="item.swift"
                        label="Swift"
                        width="200"/>
                <el-table-column
                        prop="item.beneficiary"
                        label="Beneficiario"
                        width="120"/>
                <el-table-column
                        prop="item.reference"
                        label="Referencia"
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
    export default Vue.component('BankNomenclator', {
      data:function(){
        return {
          hotels:"",
          model:{
            name:"",
            code:"",
            beneficiary:"",
            iban_nr:"",
            address:"",
            swift:"",
            reference:""
          }
        }
      },
      computed:{
        ...mapState(['bank'])
      },
      created() {
        //do something after creating vue instance
        this.newBank = Object.assign({},this.model);
        this.$store.dispatch('get',['bank']);
      },
        methods:{
            createNew(){
                this.model = this.newBank;
            },
            save(){
                this.$store.dispatch('save',['bank',this.model]);
            },
            handleCurrentRow(row){
                this.model = Object.assign(this.model,row.item);
                console.log(this.model)
            },
        }

    })
</script>
<style>
</style>
