<template>
    <div class="wraper">
        <el-container>
            <el-header class="header" height="80">
                <home-header-content/>
            </el-header>
            <el-container>
                <home-left-menu/>
                <el-main><home-content-section/></el-main>
            </el-container>
        </el-container>
    </div>
</template>
<script>

   /*
    import b  from 'buefy';
    import 'buefy/lib/buefy.css';
    import HeaderLayout from './layout/Header.vue';
    import LeftSideLayout from './layout/LeftSide.vue';
    import CenterSideLayout from './layout/CenterSide.vue';*/

    /*Vue.component('layout-header', HeaderLayout);
    Vue.component('layout-leftside', LeftSideLayout);
    Vue.component('layout-centerside', CenterSideLayout);


    Vue.use(Buefy,{
       defaultIconPack: 'fas',
    });*/
   import Vue from  'vue';
   import ElementUI from 'element-ui';
   import 'element-ui/lib/theme-chalk/index.css';
   import 'vueditor/dist/style/vueditor.min.css';
   import locale from 'element-ui/lib/locale/lang/es';
   import ContentSection from './layout/ContentSection.vue';
   import HeaderSection from './layout/HeaderSection.vue';
   import LeftSide from './layout/MenuLeftSide.vue'

   import {mapState} from 'vuex';
   Vue.use(ElementUI,{ locale });

    export default {
        computed:{
            ...mapState(["contract",'agency','newContract','market','tabs'])
        },
        data(){
            return {
                search:"",
                form:"",
                agencySelected:null,
                options: [{
                    value: 'Option1',
                    label: 'Option1'
                }, {
                    value: 'Option2',
                    label: 'Option2'
                }, {
                    value: 'Option3',
                    label: 'Option3'
                }, {
                    value: 'Option4',
                    label: 'Option4'
                }, {
                    value: 'Option5',
                    label: 'Option5'
                }],
                tableData: [{
                    date: '2016-05-03',
                    name: 'Tom',
                    state: 'California',
                    city: 'Los Angeles',
                    address: 'No. 189, Grove St, Los Angeles',
                    zip: 'CA 90036',
                    tag: 'Home'
                }, {
                    date: '2016-05-02',
                    name: 'Tom',
                    state: 'California',
                    city: 'Los Angeles',
                    address: 'No. 189, Grove St, Los Angeles',
                    zip: 'CA 90036',
                    tag: 'Office'
                }, {
                    date: '2016-05-04',
                    name: 'Tom',
                    state: 'California',
                    city: 'Los Angeles',
                    address: 'No. 189, Grove St, Los Angeles',
                    zip: 'CA 90036',
                    tag: 'Home'
                }, {
                    date: '2016-05-01',
                    name: 'Tom',
                    state: 'California',
                    city: 'Los Angeles',
                    address: 'No. 189, Grove St, Los Angeles',
                    zip: 'CA 90036',
                    tag: 'Office'
                }]
            }
        },

        methods:{
            handleClick(){},
            handleClose(){},
            handleOpen(){}
        },
        created(){

        },
        mounted(){
            this.$store.dispatch('set',['mainTab',this.$refs.MainTab])
        }
    }

</script>
