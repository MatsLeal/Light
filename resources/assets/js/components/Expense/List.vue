<template>
<table class="table is-fullwidth">
		<thead>
			<th>Amount</th>
			<th>Description</th>
			<th>Date</th>
		</thead>
		<tbody>
			<tr v-for="expense in expenses" :key="expense.id">
				<td>{{expense.amount}}</td>
				<td>{{expense.description}}</td>
				<td>{{expense.created_at}}</td>
			</tr>
		</tbody>
	</table>	
</template>


<script>
import moment from 'moment';
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
				for (let e in this.expenses){
					this.expenses[e].created_at = moment(this.expenses[e].created_at).format('ll');
				}
			})
			.catch(error=> {
				console.log(error);
				Event.$emit('notify-error','Could not fetch your latest expenses !')
			})
		}
	},
	created(){
		Event.$on('expense-added',()=> this.getExpenses());
		this.getExpenses();
	}
}
	
</script>

<style>
	

</style>