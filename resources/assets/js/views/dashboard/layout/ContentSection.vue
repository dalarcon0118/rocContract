<template>
    <div class="tab-container">
        <el-tabs ref="MainTab"
          v-model="activeTab"
          editable
          @edit="handleTabsEdit"
          type="card">
            <el-tab-pane name="1">
                <span slot="label">
                  <i class="el-icon-date">
                  </i>Inicio</span>
              <home-contract-roc></home-contract-roc>
            </el-tab-pane>
            <el-tab-pane
                    v-for="(item, index) in tabs"
                    :key="item.name"
                    :label="item.title"
                    :name="item.name"
                    :innerHtml="item.content"
            >
              <create-contract-roc :newContract="item.newContract" v-if="item.type=='contract'"/>
              <HotelesNomenclator  v-if="item.type=='hotel'"/>
              <BankNomenclator     v-if="item.type=='bank'"/>
              <CoinsNomenclator    v-if="item.type=='coins'"/>
              <SeasonNomenclator   v-if="item.type=='season'"/>
              <AgencyNomenclator   v-if="item.type=='agency'"/>
              <GeneralConditions  v-if="item.type=='generalConditions'"/>
              <SpecialsConditions  v-if="item.type=='specialsConditions'"/>
              <MarketNomenclator  v-if="item.type=='market'"/>
            </el-tab-pane>
            <!-- <el-tab-pane name="6" label="asdasd">
                <HotelesNomenclator />
            </el-tab-pane> -->
        </el-tabs>
        <!--<div class="formContainer">
            <el-button type="primary">Siguiente</el-button>
            <el-button>Cancelar</el-button>
        </div>-->
    </div>
</template>
<script>
    import Vue from 'vue';
    import {mapState} from 'vuex';
    import InitialTab from '../InitialTabItem.vue';
    import CreateContract from '../components/contract/views/createFlow/CreateContractRoc.vue';
    import HotelesNomenclator from '../components/nomenclators/hoteles/HotelesNomenclator';
    import BankNomenclator from '../components/nomenclators/bancos/BancoNomenclator';
    import CoinsNomenclator from '../components/nomenclators/divisas/CoinsNomenclator';
    import SeasonNomenclator from '../components/nomenclators/temporadas/SeasonNomenclator';
    import AgencyNomenclator from '../components/nomenclators/agencias/AgencyNomenclator';
    import MarketNomenclator from '../components/nomenclators/mercados/MarketNomenclator';
    import GeneralCondition from '../components/nomenclators/condicionesGenerales/GeneralConditions';
    import SpecialConditions from '../components/nomenclators/condicionesEspeciales/SpecialConditionNomenclator';
    export default Vue.component('home-content-section',{
        computed:{
            ...mapState(['tabs','activeTab'])
        },
        methods:{
            handleTabsEdit(targetName, action) {
                if (action === 'add') {
                    /*let newTabName = ++this.tabIndex + '';
                    this.editableTabs.push({
                        title: 'New Tab',
                        name: newTabName,
                        content: 'New Tab content'
                    });
                    this.editableTabsValue = newTabName;*/
                }
                if (action === 'remove') {
                    this.$store.dispatch('removeTab',targetName);
                   /* let tabs = this.activeTab;
                    let activeName = this.editableTabsValue;
                    if (activeName === targetName) {
                        tabs.forEach((tab, index) => {
                            if (tab.name === targetName) {
                                let nextTab = tabs[index + 1] || tabs[index - 1];
                                if (nextTab) {
                                    activeName = nextTab.name;
                                }
                            }
                        });
                    }

                    this.editableTabsValue = activeName;
                    this.editableTabs = tabs.filter(tab => tab.name !== targetName);*/
                }
            }
        },
        mounted(){
        }
    })
</script>
