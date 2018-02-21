<template>
	<div>
		<div class="tile" style="  padding-bottom: 20px">

			<article class="tile is-child notification ">

		          <p class="subtitle" > 
		          	<span class="tag is-primary is-small" @click="showAddExpense">
	         		 	+
	         		 </span>
	         		 {{ name }}   {{day.day}} 
	         		 
	         		 <span class="tag is-danger" v-if="totalSpent>0">
	         		 	{{ totalSpent }}
	         		 </span>

	         		 <span class="tag is-info" v-if="totalSpent>0 && showExpenses"  @click="toggleShowExpenses">
	         		 	^
	         		 </span>

	         		 <span class="tag is-info " v-if="totalSpent>0 && !showExpenses"  @click="toggleShowExpenses">
	         		 	v
	         		 </span>


	         	  </p>


		          <div v-for="expense in expenses" class="field is-grouped is-grouped-multiline" v-if="showExpenses">
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
	data () {
		return {
		showExpenses : false
		}
	},

	props: {
		name : String,
		number : Number,
		expenses : Array,
		day : {
			default : () => {
				return {
					day : 0
				}
			},
			type : Object
		}
	},
	methods :{
		showAddExpense(){
			Event.$emit('addExpenseOnDay',this.day.date)
		},
		toggleShowExpenses(){
			if(this.showExpenses){
				this.showExpenses=false;
			}
			else{
				this.showExpenses=true;
			}
		}
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