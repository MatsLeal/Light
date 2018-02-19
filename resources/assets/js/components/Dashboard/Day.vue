<template>
	<div>
		<div class="tile" style=" padding-right: 50px ; padding-bottom: 20px">
			<article class="tile is-child notification ">

		          <p class="subtitle"> 
	         		 {{ name }}   {{day.day}}
	         		 <span class="tag is-danger" v-if="totalSpent>0">
	         		 	{{ totalSpent }}
	         		 </span>
	         	  </p>


		          <div v-for="expense in expenses" class="field is-grouped is-grouped-multiline">
				<expense-tag :data="expense"></expense-tag>
			  </div>

		        </article>
		</div>
	</div>	
</template>


<script>

import ExpenseTag from '../Expense/ExpenseTag.vue';

export default {
	components : {
		'expense-tag' : ExpenseTag
	},

	props: {
		name : String,
		number : Number,
		expenses : Array,
		day : Object
	},
	computed : {
		totalSpent(){
			var total =0;
			this.expenses.forEach((expense)=>{
				total+=expense.amount;
			});
			return total;
		}
	}

}
	
</script>


<style>

</style>