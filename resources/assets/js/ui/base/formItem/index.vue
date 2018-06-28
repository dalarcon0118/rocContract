<template>
    <el-form-item class="roc-item" :label="label">
        <el-input v-if="type=='text'" :placeholder="placeholder" v-model="model[name]"></el-input>
        <el-select v-if="type=='select'" v-model="model[name]" :placeholder="placeholder">
            <el-option
                    v-for="item in options"
                    :key  ="item.value + '-' + item.label"
                    :label="item.label"
                    :value="item.value" />
        </el-select>
    </el-form-item>
</template>
<script>
import Vue from 'vue';
export default Vue.component('FormItem',{
    props:{
      label:"",
      options:"",
      model:"",
      name:"",
      placeholder:"",
      type:{default:"text"}
    },
    created(){

    },
    computed : {

    },
    data(){
      console.log(this.model);
      console.log(this.name)
      return {
          value:""
      }
    }
  })
</script>
