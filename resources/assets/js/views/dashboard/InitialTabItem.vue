<template>
    <el-row :gutter="20" class="center-section">
        <el-col :lg="18">
            <ContractListTable/>
        </el-col>
        <el-col :lg="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span><strong>Nuevo contrato</strong></span>
                </div>
                <div>
                    <el-select width="205" ref="agency" v-model="agency.agencySelected" placeholder="Seleccionar agencia">
                        <el-option
                                v-for="item in agency.items"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                        </el-option>
                    </el-select>
                </div>

            </el-card>
        </el-col>
    </el-row>
</template>
<script>
    import {mapState} from 'vuex';
    import Vue from 'vue';
    import ContractListTable from './components/contract/views/ContractListTable.vue'
    export default Vue.component('home-contract-roc',{
        data:function(){
            return {
                search:""
            };
        },
        computed:{

            ...mapState(["contract",'agency','market'])
        },

        created(){
            this.$store.dispatch('getAgency');

        },
        methods:{}
    })
</script>

<style>
    .topbarMenu {
        /*border-bottom:1px solid #ebeef5;*/
        display: flex;
        flex-direction: row;

    }
    .topbarMenu button {

    }
</style>
