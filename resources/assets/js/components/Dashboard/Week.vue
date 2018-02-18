<template>
<div>
	<day name="Monday" :expenses="setDayExpenses(1)"></day>
	<day name="Tuesday" :expenses="setDayExpenses(2)"></day>
	<day name="Wednesday" :expenses="setDayExpenses(3)"></day>
	<day name="Thursday" :expenses="setDayExpenses(4)"></day>
	<day name="Friday" :expenses="setDayExpenses(5)"></day>
	<day name="Saturday" :expenses="setDayExpenses(6)"></day>
	<day name="Sunday" :expenses="setDayExpenses(0)"></day>
</div>	
</template>


<script>
import Day from './Day.vue'

export default {

	props : {
		expenses : Array
	},

	components : {
		'day' : Day
	},

	methods : {
		setDayExpenses( dayNumber ){
			return this.expenses.filter ( (expense) => {
				return expense.dayOfWeek==dayNumber;
			})
		}
	}
}
	
</script>


<style>

</style>