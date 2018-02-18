<template>
		    <div class="card" style="padding-top : 20 px" :key="data.id">
		  	<header class="card-header">
			   	 <p class="card-header-title">
				      {{data.created_at}}
				      i spent {{data.amount}}
			    	</p>

				<a  class="card-header-icon" aria-label="more options">
					<span class="tag is-danger" v-if="data.type">
						{{data.type}}
					</span>
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

  name: 'ExpenseCard',

  props : {
  	data : {
  		type : Object
  	}
  },

  data () {
    return {
    	endPoint : '/expenses/',
    }
  }
}
</script>

<style lang="css" scoped>
</style>