<template>
<div class="card"
     style="padding-top : 20 px">
  <header class="card-header">
    <p class="card-header-title">
      {{data.created_at}} i recived {{data.amount}}
    </p>
    <a class="card-header-icon"
       aria-label="more options">
 	<span class="tag is-info" v-if="data.type">{{data.type}}</span>
 	<span class="tag is-delete" @click="destroy(data)" @deleted="this.$emit('deleted')"></span>
     </a>
  </header>
  <div class="card-content">
    <div class="content">
      {{data.description}}
    </div>
  </div>
</div>

</template>

<script>
import Item from '../../libary/Item.vue';
export default {

  extends : Item,

  name: 'IncomeCard',

  props : {
  	data : {}
  },


  data() {
    return {
    	endPoint : '/incomings/'
    }
  },

  methods : {
  }
}

</script>

<style lang="css" scoped="">
</style>
