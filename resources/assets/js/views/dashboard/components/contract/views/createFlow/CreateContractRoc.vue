<template>
    <div>
        <el-card class="box-card">
            <el-tabs  v-model="tabIndex"  @edit="handleTabsEdit"
                     type="card">
                <el-tab-pane name="1" label="Asociar a marcos jurídicos">
                    <LawFrame :newContract="newContract"/>
                </el-tab-pane>
                <el-tab-pane name="2" label="Datos generales">
                    <roc-general-data :newContract="newContract" />
                </el-tab-pane>
                <el-tab-pane name="3"  label="Precios">
                    <roc-price ref="priceTab" :newContract="newContract" />
                </el-tab-pane>
                <el-tab-pane name="4" label="Suplemento obligatorio" >
                    <roc-supplements :newContract="newContract" />
                </el-tab-pane>
                <el-tab-pane name="5" label="Condiciones especiales">
                    <SpecialConditions :newContract="newContract" />
                </el-tab-pane>
            </el-tabs>

        </el-card>
        <div class="formContainer">
            <el-button ref="nextButton" @click="Next" type="primary">{{buttonTitle}}</el-button>
            <el-button>Cancelar</el-button>
        </div>
    </div>

</template>
<script>
    import Vue from 'vue';
    import GeneralData from './tabs/GeneralDataTab.vue';
    import RocPrices from './tabs/PriceContractTabItem.vue';
    import Suplements from './tabs/SuplyAndConditions.vue'
    import Juridic from './tabs/LawFrame.vue';
    import SpecialConditions from './tabs/SpecialConditions.vue'
    export default Vue.component('create-contract-roc',{
      props:{
        newContract:{}
      },
        data:function(){
            return {
                activeTb_:null,
                tabIndex: "1",
                tabPos:1,
                buttonTitle:"Siguiente"
            }
        },
        created() {
          //do something after creating vue instance
          
        },
        methods:{
            activeTab(active){
                this.activeTb_ = active;
               if(active.label == "Precios"){
                   console.log(this.$refs);
                   this.$refs.priceTab.active();
               }
               if(this.activeTb_.label=="Asociar a marcos jurídicos"){
                   this.buttonTitle = "Finalizar";
               }
            },
            handleTabsEdit(){

            },
            Next(){
                if(this.activeTb_ && this.activeTb_.label=="Asociar a marcos jurídicos"){
                    this.$store.dispatch('createServerContract');
                }
                else{
                    this.tabIndex = ++this.tabPos+ '';
                    if(this.tabPos==5)this.buttonTitle = "Finalizar";
                }
            }
        }
    })
</script>
<style>
    .formContainer{
        display: flex;
        flex-flow: row;
        justify-content: flex-end;
        margin: 10px 0;
    }
</style>
