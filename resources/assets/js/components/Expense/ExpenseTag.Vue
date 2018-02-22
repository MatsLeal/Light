<template>
			  <div class="control" draggable="true" :title="data.description">
				    <div class="tags has-addons">
				      <span class="tag is-danger" >
				      	{{ data.type}}
				      </span>
				      <span class="tag is-dark" style="text-decoration: none">
				      	${{ data.amount }}
				      </span>
				      <span class="tag is-delete" @click="destroy(data)"></span>
				    </div>
			  </div>	
</template>

<script>

	export default {
		props : {
			data : {}
		},
		methods : {
			destroy(expense){
				if(confirm("Sure to delete this expense ?")){
				axios.delete('/expenses/'+expense.id)				
				.then(response => {
					Event.$emit('notify-success',response.data.message);
					Event.$emit('expense-deleted',expense)
				})
				}
			}
		}
	}
	
</script>

<style>
	
</style>