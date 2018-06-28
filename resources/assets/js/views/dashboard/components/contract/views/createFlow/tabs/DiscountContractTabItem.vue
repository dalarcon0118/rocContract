<template>
<div class="price">
    <el-form ref="form" :model="form" label-position="top" label-width="120px">
        <el-row :gutter="20" class="center-section">
            <el-col :span="11">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Periodo</legend>
                    <el-col :span="11">
                        <el-form-item label="Fecha de inicio">
                            <el-date-picker type="date" placeholder="Fecha de inicio" v-model="form.date1" style="width: 100%;"></el-date-picker>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Fecha de fin">
                            <el-date-picker type="date" placeholder="Fecha de fin" v-model="form.date1" style="width: 100%;"></el-date-picker>
                        </el-form-item>
                    </el-col>

                </fieldset>
                <el-form-item class="button-container">
                    <el-button type="primary">Agregar</el-button>
                    <el-button>Limpiar</el-button>
                </el-form-item>
            </el-col>
            <el-col :span="11">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"></legend>
                    <el-col :span="11">
                        <el-form-item label="Tipo de Habitación:">
                            <el-select v-model="hotelRoom.value" placeholder="Por favor,seleccione el habitación">
                                <el-option
                                        v-for="item in hotelRoom.items"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Suplemento">
                            <el-select v-model="supplement.value" placeholder="Por favor,seleccione el suplemento">
                                <el-option
                                        v-for="item in supplement.items"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Precio">
                            <el-input-number v-model="num8" type="number" controls-position="right" :min="1" :max="10"></el-input-number>
                        </el-form-item>
                    </el-col>

                </fieldset>
            </el-col>
        </el-row>
        
    </el-form>
    <el-row :gutter="20" class="center-section">
        <el-col :span="16">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span class="title-label">Precios</span>
                    <el-input class="search-contract"
                              placeholder="Servicio"
                              prefix-icon="el-icon-search"
                              v-model="search">
                    </el-input>
                </div>
                <el-table
                        :data="offerts"
                        height="250">
                    <el-table-column
                            fixed
                            prop="room"
                            label="Tipo de habitación"
                            width="200">
                    </el-table-column>
                    <el-table-column
                            fixed
                            prop="periode"
                            label="Periodo"
                            width="200">
                    </el-table-column>
                    <el-table-column
                            fixed
                            prop="service"
                            label="Servicio"
                            width="150">
                    </el-table-column>
                    <el-table-column
                            prop="price"
                            label="Precio"
                            width="100">
                    </el-table-column>
                    <el-table-column
                            prop="release"
                            label="Release"
                            width="180">
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
    export default Vue.component('roc-price',{
        computed:{
            ...mapState(['hotel','hotelRoom','supplement'],)
        },
        data(){
            return {
                form:{},
                offerts:[{
                    room:"STANDARD",
                    periode:"2017/11/01-2017/12/21",
                    service:"Release CP",
                    release:21,
                    price:'100.00'
                }]

            }
        },
        methods:{
            active(){
                if(this.hotel.value){
                    this.$store.dispatch('get',['hotelRoom',['hotel_id',this.hotel.value]]);

                }
            }
        },
        created(){
            this.$store.dispatch('get',['supplement'])
        }
    })
</script>