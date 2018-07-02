<template>
<div class="price">
    <el-form ref="form" :model="form" label-position="top" label-width="120px">
        <el-row :gutter="20" class="center-section">
            <el-col :span="11">
                <fieldset class="scheduler-border">
                    <el-col :span="11">
                        <FormItem
                                label="Condiciones especiales:"
                                type="select"
                                name="specialCondition"
                                :options="specialConditions.items"
                                :model="model"
                        />

                    </el-col>
                </fieldset>
                <el-form-item class="button-container">
                    <el-button @click="add"  type="primary">Agregar</el-button>
                    <el-button @click="clean" >Limpiar</el-button>
                </el-form-item>
            </el-col>
        </el-row>

    </el-form>
    <el-row :gutter="20" class="center-section">
        <el-col :span="22">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <div class="containHeader search">
                        <span style="font-weight: bold;">Condiciones especiales</span>
                    </div>
                </div>
                <el-table
                        :data="newContract.specialConditionsArr"
                        highlight-current-row

                        height="250">
                    <el-table-column
                            fixed
                            prop="category"
                            label="Categoría"
                            width="300"
                           >
                    </el-table-column>

                    <el-table-column
                            prop="specialCond"
                            label="Condiciones especiales"
                           >
                    </el-table-column>
                </el-table>
            </el-card>
        </el-col>
    </el-row>
</div>
</template>
<script>
    import Vue from 'vue';
    import {mapState} from 'vuex';
    import {formarStrValue,formatDate} from '../../../../../util/';
    import FormItem from '../../../../../../../ui/base/formItem';
    import FieldSet from '../../../../../../../ui/base/FieldSet';
    export default Vue.component('SpecialConditions',{
      props:{
          newContract:{}
        },
        computed:{
            ...mapState(['mandatorySupplem','supplement','discount'])
        },
        data(){
            return {
               model:{
                   specialCondition:{}
               }

            }
        },
        computed:{
            ...mapState(['specialConditions'])
        },
        methods:{
            handleSelectionChange(){

            },
            add(){
                let nc_ms = this.newContract.mandatorySupplem;

                this.newContract.mandatorySupplemArr.push({
                    supp: formarStrValue(nc_ms.idSuplement,1),
                    suppID: formarStrValue(nc_ms.idSuplement,0),
                    value: nc_ms.value,
                    personKind:formarStrValue(nc_ms.personKind,1),
                    personKindID:formarStrValue(nc_ms.personKind,0),
                    valueType:nc_ms.valueType

                });
                this.newContract.mandatorySupplem = this.clean;
            }

        },
        clean(){
            this.newContract.mandatorySupplem = this.clean;
        },
        created(){
            this.$store.dispatch('get',['specialConditions']);
            /*this.clean = Object.assign({},this.newContract.mandatorySupplem);
            this.$store.dispatch('get',['discount']);*/

        }
    })
</script>
<style>
    /*.containHeader.title.search{
        display: flex;
        flex-direction:row;
    }*/

</style>
