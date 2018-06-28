<template>
    <div>
        <el-table
                :data="generalcondition.items"
                @selection-change="handleSelectionChange"
                height="250">
            <el-table-column
                    type="selection"
                    width="55"/>
            <el-table-column
                    prop="agency"
                    label="Agencia"
                    >
            </el-table-column>

            <el-table-column
                    prop="name"
                    label="Denominación"
                    >
            </el-table-column>

        </el-table>
    </div>
</template>
<script>
import Vue from 'vue';
import {mapState} from 'vuex';
export default Vue.component('LawFrame',{
    props:{
      newContract:{}
    },
    methods:{
        handleSelectionChange(val){
            console.log(val);
        },
    },
    computed: {
            ...mapState(['generalcondition','createContract'])
    },
    created() {
        this.$store.dispatch('get', ['generalcondition']);
    }
})
</script>
<style>

</style>
