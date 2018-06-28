<template>
    <el-card class="box-card">
        <div slot="header" class="clearfix">
            <div class="titleSection">
                <span class="title-label">Mis contratos</span>

                <el-input class="search-contract"
                          placeholder="Nro contrato"
                          prefix-icon="el-icon-search"
                          @change="search"
                          v-model="contractTableList.querysearch"/>
            </div>
            <div class="topbarMenu">
                <el-button size="small" @click="newContract" round >Nuevo </el-button>
                <span class="separator"></span>
                <el-button size="small" @click="pdf" round >Ver en pdf </el-button>
                <el-button size="small" @click="edit" round >Editar</el-button>
            </div>
        </div>

        <el-table
                :data="contract"
                highlight-current-row
                ref="contractList"
                @current-change="handleCurrentRow"
                height="250">
            <el-table-column
                    fixed
                    prop="contractNbr"
                    label="Nro"
                    width="100"/>
            <el-table-column
                    prop="status"
                    label="Estado"
                    width="100"/>
/
            <el-table-column
                    prop="marketLabel"
                    label="Mercado"
                    width="180"/>
            <el-table-column
                    prop="hotelLabel"
                    label="Hotel"
                    width="200"/>
            <el-table-column
                    prop="coinlabel"
                    label="Moneda"
                    width="120"/>
            <el-table-column
                    prop="ref"
                    label="Referencia"
                    width="200"/>
        </el-table>
        <div class="block">
            <span class="demonstration">Total de contratos</span>
            <el-pagination
                    @size-change="handleSizeChange"
                    @current-change="handleCurrentChange"
                    :current-page.sync="contractTableList.currentPage"
                    :page-size="10"
                    layout="total, prev, pager, next"
                    :total="contractTableList.totalCount">
            </el-pagination>
        </div>
    </el-card>
</template>

<script>
    import {mapState} from 'vuex';
    import Vue from 'vue';
    export default Vue.component('ContractListTable', {

        data: function () {
            return {
                currentPage1:1,
                currentRow:null,
            };
        },
        methods:{
            handleSizeChange(){
                console.log(arguments)
            },
            handleCurrentChange(number){
                this.currentPage = number;
                this.$store.dispatch('getContract');
            },
            handleCurrentRow(row){
                this.$store.dispatch('selectedrow',['contractList',row]);
            },
            newContract(){
                this.$store.dispatch('createContract');
            },
            search(){
                    this.$store.dispatch('getContract');
            },
            edit(){
                this.$store.dispatch('editRow',['contractList']);
            },
            pdf(){

            }
        },
        created(){
            this.$store.dispatch('getContract');
            this.$store.dispatch('getContractTotalCount')
        },
        computed: {
            ...mapState(["contract",'contractTableList'])
        },
    })
</script>
<style>
.titleSection{
  display: flex;
  flex-direction: row;
}

.separator{
    display: block;
    margin: 0 10px;
    border-right: 1px solid #ebeef5;
}
.search-contract{
  margin-left: auto;
}
</style>
