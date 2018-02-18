<template>
</template>

<script>
import Collection from '../../libary/Collection.vue';
export default {

  name: 'TransactionCard',

  extends : Collection,

  data () {
    return {
    	items : {}
    }
  },
created(){
	this.getItems();
}
}
</script>

<style lang="css" scoped>
</style>