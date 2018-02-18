<template>
</template>

<script>
export default {

  name: 'Item',

  data () {
    return {
    	data : {}
    }
  },
  methods : {
  	destroy(data){
  		axios.delete(this.endPoint+data.id)
  		.then(response=> this.$emit('deleted'))
  	}
  }
}
</script>

<style lang="css" scoped>
</style>