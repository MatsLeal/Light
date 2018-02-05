<template>
  <div class="box">
    <div class="card" v-for="expense in expenses" style="padding-top : 20 px">
  <header class="card-header">
    <p class="card-header-title">
      {{expense.created_at}}
      i spent {{expense.amount}}
    </p>
		   <a  class="card-header-icon" aria-label="more options">
			<span class="tag is-danger" v-if="expense.type">{{expense.type}}</span>
			</a>
  </header>
  <div class="card-content">
    <div class="content">
      {{expense.description}}
    </div>
  </div>
</div>
  </div>

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
