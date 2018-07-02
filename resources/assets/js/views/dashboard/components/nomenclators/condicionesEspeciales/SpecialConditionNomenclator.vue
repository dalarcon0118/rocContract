<template>
    <div>
        <el-form ref="form" :model="form" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                    <FormItem
                       label="Denominación:"
                       type="text"
                       name="name_es"
                       :model="model"
                     />

                </el-col>
                <el-col :span="11">
                  <FormItem
                     label="Condición:"
                     type="select"
                     name="condition_category_id"
                     :options="specialConditionsCategory.items"
                     :model="model"
                  />
                </el-col>


            </el-row>
            <el-row style="margin-top: 20px;">
                <el-col>
                  <el-form-item class="button-container">
                      <el-button @click="createNew" type="primary">Nuevo</el-button>
                      <el-button @click="save"  >Guardar</el-button>
                  </el-form-item>
                </el-col>
            </el-row>
        </el-form>
        <el-row :gutter="20" class="center-section">
          <el-col :span="22">
            <el-table
                    class="table"
                    :data="specialConditions.items"
                    highlight-current-row
                    ref="contractList"
                    @current-change="handleCurrentRow"
                    height="250">
                <el-table-column
                        fixed
                        prop="item.name_es"
                        label="Denominación"
                      />
                <el-table-column
                        fixed
                        prop="item.nomenclador.name_es"
                        label="Denominación"
                />
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
    export default Vue.component('SpecialsConditions', {
      data:function(){
        return {
          hotels:"",
          model:{
            name_es:"",
            id:"",
            condition_category_id:"",
          },
        }
      },
        computed:{
            ...mapState(['specialConditionsCategory','specialConditions'])
        },
        created(){
          this.emty = Object.assign({},this.model);
            this.$store.dispatch('get',['specialConditionsCategory']);
            this.$store.dispatch('get',['specialConditions']);

        },
        methods:{
            handleCurrentRow(row){
                this.model = Object.assign(this.model,row.item);
                let actualSelect = _.filter(this.specialConditionsCategory.items,{defaultValue:row.item.condition_category_id});
                this.model.condition_category_id = actualSelect[0].value;
            },
            createNew(){

            },
            save(){

            }
        }

    })
</script>
<style>
</style>
