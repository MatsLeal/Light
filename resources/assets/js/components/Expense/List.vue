<template>
<ul>
	<li v-for="expense in expenses" :key="expense.id">
		{{expense.description}}
	</li>
</ul>	
</template>


<script>

export default{
	data(){
		return {
			expenses : []
		}
	},

	methods:{
		getExpenses(){
			axios.get('/expenses')
			.then(response=> {
				this.expenses=response.data;
				Event.$emit('notify-success',' Expenses retrived !');
			})
			.catch(error=> Event.$emit('notify-error','Could not fetch your latest expenses !'))
		}
	},
	created(){
		this.getExpenses();
	}
}
	
</script>

<style>
	

</style>