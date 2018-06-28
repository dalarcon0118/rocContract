<template>
    <div class="general-tab">
        <el-form ref="form" :model="form" label-position="top" label-width="120px">
            <el-row :gutter="20" class="center-section">
                <el-col :span="11">
                    <div>
                        <el-col :span="11">
                            <el-form-item label="Nro contrato">
                                <el-input v-model="newContract.contractNbr"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col :span="11">
                            <el-form-item label="Referencia:">
                                <el-input v-model="newContract.ref"></el-input>
                            </el-form-item>
                        </el-col>

                    </div>
                    <el-form-item label="Periodo de contratación:">
                        <el-col :span="11">
                            <el-date-picker type="date" placeholder="Fecha de inicio" v-model="newContract.periodContrac.startdDate" style="width: 100%;"></el-date-picker>
                        </el-col>
                        <el-col :span="11">
                            <el-date-picker type="date" placeholder="Fecha de fin" v-model="newContract.periodContrac.endDate" style="width: 100%;"></el-date-picker>
                        </el-col>
                    </el-form-item>
                </el-col>
                <el-col :span="11">
                    <el-col :span="11">
                        <el-form-item label="Mercado:">
                            <el-select v-model="newContract.market" placeholder="Por favor seleccione:">
                                <el-option
                                        v-for="item in market.items"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="Moneda:">
                            <el-select v-model="newContract.coin" placeholder="Por favor seleccione:">
                                <el-option
                                        v-for="item in coin.items"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Hotel:">
                            <el-select v-model="newContract.hotel" placeholder="Por favor seleccione:">
                                <el-option
                                        v-for="item in hotel.items"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="Dias(Cond.Pago):">
                            <el-input
                                    placeholder="Dias(Cond.Pago)"
                                    v-model="newContract.days">
                            </el-input>
                        </el-form-item>
                    </el-col>
                </el-col>
            </el-row>
        </el-form>
    </div>
</template>
<script>
    import Vue from 'vue';
    import {mapState} from 'vuex';
    export default Vue.component('roc-general-data',{
        props:{
          newContract:{}
        },
        computed:{
            ...mapState(['hotel','coin','market'])
        },
        data(){
            return {
                dias:"",
                form:{}
            }
        },
        created(){
            this.$store.dispatch('get',['hotel']);
            this.$store.dispatch('get',['coin']);
            this.$store.dispatch('get',['market']);
        }
    })
</script>
