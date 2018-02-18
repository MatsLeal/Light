<template>
	<div>
		<div class="tile" style=" padding-right: 50px ; padding-bottom: 20px">
			<article class="tile is-child notification ">

		          <p class="subtitle"> {{ name }}  </p>

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
		number : String,
		expenses : Array
	}

}
	
</script>


<style>

</style>