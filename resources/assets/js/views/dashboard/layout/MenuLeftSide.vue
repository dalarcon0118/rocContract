<template>
    <el-aside class="leftSide">
        <el-row class="tac">
            <el-col :span="24">
                <el-menu
                        default-active="2"
                        class="el-menu-vertical"
                        background-color="#545c64"
                        text-color="#fff"
                        active-text-color="#ffd04b">

                    <el-menu-item index="1" @click="clickMenu('home')" >
                        <i class="el-icon-menu"></i>
                        <span>Inicio</span>
                    </el-menu-item>
                    <el-menu-item index="2" @click="clickMenu('hotel')">
                        <i class="el-icon-document"></i>
                        <span>Hoteles</span>
                    </el-menu-item>
                    <el-menu-item index="3"  @click="clickMenu('bank')">
                        <i class="el-icon-seting"></i>
                        <span>Bancos</span>
                    </el-menu-item>
                    <el-menu-item index="4"  @click="clickMenu('agency')">
                        <i class="el-icon-setting"></i>
                        <span>Agencias</span>
                    </el-menu-item>
                    <el-menu-item index="5"  @click="clickMenu('coins')">
                        <i class="el-icon-setting"></i>
                        <span>Divisas</span>
                    </el-menu-item>
                    <el-menu-item index="6"  @click="clickMenu('market')">
                        <i class="el-icon-setting"></i>
                        <span>Mercados</span>
                    </el-menu-item>
                    <el-menu-item index="7" @click="clickMenu('season')">
                        <i class="el-icon-setting"></i>
                        <span>Temporadas</span>
                    </el-menu-item>
                    <el-menu-item index="8"  @click="clickMenu('generalConditions')">
                        <i class="el-icon-setting"></i>
                        <span>Condiciones Generales</span>
                    </el-menu-item>
                    <el-menu-item index="9"  @click="clickMenu('specialsConditions')">
                        <i class="el-icon-setting"></i>
                        <span>Condiciones Especiales</span>
                    </el-menu-item>
                    <el-menu-item index="10">
                        <i class="el-icon-setting"></i>
                        <span>Generales</span>
                        <!-- <el-submenu>
                          <el-menu-item>
                            <i class="el-icon-setting"></i>
                            <span>Tipo de habitación</span>
                          </el-menu-item>
                          <el-menu-item>
                            <i class="el-icon-setting"></i>
                            <span>Plan</span>
                          </el-menu-item>
                          <el-menu-item>
                            <i class="el-icon-setting"></i>
                            <span>Suplementos</span>
                          </el-menu-item>
                          <el-menu-item>
                            <i class="el-icon-setting"></i>
                            <span>Tipos de clientes</span>
                          </el-menu-item>
                        </el-submenu> -->
                    </el-menu-item>


                </el-menu>
            </el-col>
        </el-row>
    </el-aside>
</template>
<script>
    import Vue from 'vue';
    import {mapActions} from 'vuex';
    export default Vue.component('home-left-menu',{
      props:{
        },
      computed :{

      },
      methods: {
          ...mapActions(['clickMenu'])
      }

    })
</script>
<style>
.leftSide{
    width: 220px;
}
.el-menu-vertical{
    height: 100vh;
}
</style>
