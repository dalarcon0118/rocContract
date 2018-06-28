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
                </el-col>
                <el-col :span="11">
                  <el-col :span="22">
                    <FormItem
                       label="Agencias"
                       type="select"
                       name="agency"
                       :options="agency.items"
                       :model="model"
                    />
                  </el-col>
              </el-col>
            </el-row>
            <el-row :gutter="20" class="center-section">
                <el-col :span="22">
                  <el-form-item class="roc-item" label="Condiciones generales:">
                    <div style="width: 100%;height: 300px;">
                      <Vueditor ref="editor"/>
                    </div>

                  </el-form-item>

                </el-col>

            </el-row>
            <el-row style="margin-top: 20px;">
                <el-col>
                  <el-form-item class="button-container">
                      <el-button @click="add" type="primary">Nuevo</el-button>
                      <el-button @click="clean"  >Guardar</el-button>
                  </el-form-item>
                </el-col>
            </el-row>
        </el-form>
        <el-row :gutter="20" class="center-section">
          <el-col :span="22">
            <el-table
                    class="table"
                    :data="generalcondition.items"
                    highlight-current-row
                    @current-change="handleCurrentRow"
                    ref="contractList"
                    height="250">
                <el-table-column
                        fixed
                        prop="name"
                        label="Denominación"
                        width="350"
                        />
                <el-table-column
                        prop="agency"
                        label="Agencia"
                        width="100"/>

                <!--<el-table-column
                        prop="item.content_es"
                        label="Condiciones"
                      />-->
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
    export default Vue.component('GeneralConditions', {
      data:function(){
        return {
          model:{
            agency:"",
              content_es:"",
            name:""
          }
        }
      },
      computed:{
        ...mapState(['agency','generalcondition'])
      },
      created() {
        //do something after creating vue instance
        this.$store.dispatch('get',['agency']);
        this.$store.dispatch('get',['generalcondition'])
      },
        methods:{
            handleCurrentRow(row){
                this.model = Object.assign(this.model,row);
                this.model.content_es = row.item.content_es;
                let actualSelect = _.filter(this.generalcondition.items,{agencyValue:row.agencyValue});
                this.model.agency = actualSelect[0].agencyValue;
                this.$refs.editor.setContent(this.model.content_es);
                console.log(this.model);
            }
        }

    })
</script>
<style>
</style>
