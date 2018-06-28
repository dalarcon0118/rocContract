<template>
    <el-row>
        <el-col :lg="3" class="logo-cell">
            <img src="/images/roc_logo.jpeg" class="header-logo"/>
        </el-col>
        <el-col :lg="4"  class="search-cell">

        </el-col>

        <el-col :lg="3" :offset="16" class="user-cell">
            <el-badge :value="12" class="item">
                <el-button size="small" circle class="user-button">
                    <img src="/images/dashboard_user.png" class="user-profile"/>
                </el-button>
                <h5 class="user-name">Silvia</h5>
            </el-badge>
        </el-col>
    </el-row>
</template>

<script>
    import Vue from 'vue';
    export default Vue.component('home-header-content',{

    })
</script>
