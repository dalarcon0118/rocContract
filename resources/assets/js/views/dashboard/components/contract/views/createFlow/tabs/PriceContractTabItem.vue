<template>
<div class="price">
    <el-form ref="form" :model="form" label-position="top" label-width="120px">
        <el-row :gutter="20" class="center-section">
            <el-col :span="11">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Periodo</legend>
                    <el-col :span="11">
                        <el-form-item label="Fecha de inicio">
                            <el-date-picker type="date" placeholder="Fecha de inicio" v-model="newContract.price.startDate" style="width: 100%;"></el-date-picker>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Fecha de fin">
                            <el-date-picker type="date" placeholder="Fecha de fin" v-model="newContract.price.endDate" style="width: 100%;"></el-date-picker>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Tipo de Habitación:">
                            <el-select v-model="newContract.price.typeRoom" placeholder="Por favor,seleccione el habitación">
                                <el-option
                                        v-for="item in hotelRoom.items"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value + '-' + item.label">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Release:">
                            <el-input v-model="newContract.price.release"></el-input>
                        </el-form-item>
                    </el-col>
                </fieldset>
                <el-form-item class="button-container">
                    <el-button @click="add" type="primary">Agregar</el-button>
                    <el-button @click="clean"  >Limpiar</el-button>
                </el-form-item>
            </el-col>
            <el-col :span="11">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"></legend>
                    <el-row :gutter="20" :class="activeDiscount? 'disabled':''">
                        <el-col :span="11">
                            <el-form-item label="Suplemento">
                                <el-select :filterable ="true" :clearable="true" v-model="newContract.price.supply" placeholder="Por favor,seleccione el suplemento">
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
                                <el-input v-model="newContract.price.price"></el-input>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </fieldset>
                <fieldset class="scheduler-border" style="position: relative;">
                    <legend class="scheduler-border" style="margin-left: 16px">Agregar descuento</legend>
                    <div class="head price">
                        <span>
                        <input v-model="activeDiscount"  type="checkbox">
                    </span>
                    </div>
                    <el-row :gutter="20" :class="activeDiscount? '':'disabled'">
                        <el-col :span="11">
                            <el-form-item label="Descuento">
                                <el-select v-model="newContract.price.discount" placeholder="Por favor,seleccione el suplemento">
                                    <el-option
                                            v-for="item in discount.items"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </el-form-item>
                        </el-col>
                        <el-col :span="11">
                            <el-form-item label="%del Precio o FREE">
                                <el-input v-model="newContract.price.discountPrice"></el-input>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </fieldset>
            </el-col>
        </el-row>

    </el-form>
    <el-row :gutter="20" class="center-section">
        <el-col :span="22">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span class="">Precios</span>
                    <span style="font-weight: bold" class="">(Habitación estándar)</span>
                </div>
                <el-table
                        :data="newContract.priceArr"
                        height="250">
                    <el-table-column
                            fixed
                            prop="service"
                            label="Suplemento"
                    />
                    <el-table-column
                            fixed
                            prop="periode"
                            label="Periodo"
                            width="200">
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
    import {formarStrValue,formatDate} from '../../../../../util/';
    export default Vue.component('roc-price',{
        props:{
          newContract:{}
        },
        computed:{
            ...mapState(['hotel','hotelRoom','supplement','release','discount'])
        },
        data(){
            return {
                activeDiscount:false

            }
        },
        methods:{
            active(){
                if(this.newContract.hotel){
                    this.$store.dispatch('get',['hotelRoom',['hotel_id',this.newContract.hotel]]);

                }
            },
            getText(arr,value,){
                let label ="";
                arr.forEach((item,index)=>{
                    if(item.value==value){
                        return label = item.label;

                    }
                })
                return label;
            },

            add: function () {
                let nc_pr = this.newContract.price;


                this.newContract.priceArr.push({
                    room: formarStrValue(nc_pr.typeRoom,1),
                    roomID: formarStrValue(nc_pr.typeRoom,0),
                    periode: formatDate(nc_pr.startDate) + "-" + formatDate(nc_pr.endDate),
                    service:nc_pr.supply? formarStrValue(nc_pr.supply,1):formarStrValue(nc_pr.discount,1) ,
                    serviceID:nc_pr.supply? formarStrValue(nc_pr.supply,0):formarStrValue(nc_pr.discount,0) ,
                    price:nc_pr.price ? nc_pr.price : nc_pr.discountPrice,
                    release:nc_pr.release

                });
                this.newContract.price = this.clean;
            },
            clean(){
                this.newContract.price = this.clean;
            }
        },
        created(){
            this.clean = Object.assign({},this.newContract.price);
            this.$store.dispatch('get',['supplement']);
            this.$store.dispatch('get',['discount']);
        }
    })
</script>
<style>
    .el-form-item.button-container{
        margin: 10px 0;

    }
    .head.price{
       position: absolute;
        top:0
    }
    .disabled {
        opacity: .25;
        cursor: not-allowed;
    }
    .disabled input, .el-select .el-input__inner{
        cursor: not-allowed;
    }
    fieldset.disabled > *{
        cursor: none;
    }
</style>
