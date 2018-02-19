<template>
<div>
	<day :number="0" name="Sunday" 
			:expenses="setDayExpenses(0)"    
			v-if="isStartOfMonth(0)"
			:day="setDay(0)">
			
	</day>
	<day :number="1" name="Monday"   
			:expenses="setDayExpenses(1)"    
			v-if="isStartOfMonth(1)"
			:day="setDay(1)">
			
	</day>
	<day :number="2" name="Tuesday" 
			:expenses="setDayExpenses(2)"    
			v-if="isStartOfMonth(2)"
			:day="setDay(2)">
			
	</day>
	<day :number="3" name="Wednesday" 
			:expenses="setDayExpenses(3)"    
			v-if="isStartOfMonth(3)"
			:day="setDay(3)">
			
	</day>
	<day :number="4" name="Thursday" 
			:expenses="setDayExpenses(4)"    
			v-if="isStartOfMonth(4)"
			:day="setDay(4)">
			
	</day>
	<day :number="5" name="Friday" 
			:expenses="setDayExpenses(5)"    
			v-if="isStartOfMonth(5)"
			:day="setDay(5)">
			
	</day>
	<day :number="6" name="Saturday" 
			:expenses="setDayExpenses(6)"    
			v-if="isStartOfMonth(6)"
			:day="setDay(6)">
			
	</day>
</div>	
</template>


<script>
import Day from './Day.vue'

export default {

	props : {
		expenses : Array,
		firstDay : {
			default : 0,
			type : Number
		},
		days : Array
	},

	components : {
		'day' : Day
	},

	methods : {
		setDayExpenses( dayNumber ){
			return this.expenses.filter ( (expense) => {
				return expense.dayOfWeek==dayNumber;
			})
		},
		isStartOfMonth(number){
			return number>=this.firstDay;
		},
		setDay(dayNumber){
			return this.days.filter((day)=>{return day.weekDay==dayNumber})[0];
		}
	}
}
	
</script>


<style>

</style>