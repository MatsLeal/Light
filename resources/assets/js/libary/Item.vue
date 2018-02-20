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
  	},
    patch(data){
      axios.patch(this.endPoint+data.id,data)
      .then(response=> this.$emit('updated'))
    }
  }
}
</script>

<style lang="css" scoped>
</style>