<template>
      <fieldset class="scheduler-border">
        <legend class="scheduler-border">{{label}}</legend>
          <slot></slot>
      </fieldset>
</template>
<script>
import Vue from 'vue';
export default Vue.component('Fieldset',{
    props:{
      label:""
    },
    created(){
      console.log(this.props)
    },
    data(){
      return {};
    }
  })
</script>
