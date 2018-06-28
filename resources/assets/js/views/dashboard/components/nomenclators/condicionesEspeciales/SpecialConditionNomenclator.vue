<template>
    <div>
        <el-form ref="form" :model="form" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                    <FormItem
                       label="Denominación:"
                       type="text"
                       name="name"
                       :model="model"
                     />

                </el-col>
                <el-col :span="11">
                  <FormItem
                     label="Agencias"
                     type="select"
                     name="category"
                     :options="category"
                     :model="model"
                  />
                </el-col>


            </el-row>
            <el-row style="margin-top: 20px;">
                <el-col>
                  <el-form-item class="button-container">
                      <el-button @click="add" type="primary">Agregar</el-button>
                      <el-button @click="clean"  >Limpiar</el-button>
                  </el-form-item>
                </el-col>
            </el-row>
        </el-form>
        <el-row :gutter="20" class="center-section">
          <el-col :span="22">
            <el-table
                    class="table"
                    :data="hotels"
                    highlight-current-row
                    ref="contractList"
                    height="250">
                <el-table-column
                        fixed
                        prop="nombre"
                        label="Denominación"
                      />
                <el-table-column
                        prop="address"
                        label="Categoría"
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
    export default Vue.component('SpecialsConditions', {
      data:function(){
        return {
          hotels:"",
          model:{
            direction:"xczxc",
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
        methods:{
            handleCurrentRow(row){
                this.model.pointer(row)
            }
        }

    })
</script>
<style>
</style>
