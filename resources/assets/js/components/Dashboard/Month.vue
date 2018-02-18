<template>
	
<div>
	<notification></notification>

<div class="tile is-ancestor">
	<week :expenses="setWeekExpenses(1)"></week>	
	<week :expenses="setWeekExpenses(2)"></week>	
	<week :expenses="setWeekExpenses(3)"></week>	
	<week :expenses="setWeekExpenses(4)"></week>	
	<week :expenses="setWeekExpenses(5)"></week>	
</div>
</div>
</template>


<script>
import Week from './Week.vue';
import Notification from '../Notification.vue'
var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
export default {
	components : {
		'week' : Week,
		'notification' : Notification
	},

	data(){
		return {
			expenses : [],
			days : [],
			}
	},
	methods : {
		getMonthExpenses(){
			var date= new Date();
			axios.get('/monthexpenses/'+(date.getMonth() + 1))
			.then(response => this.onSuccess(response))
		},

		setDays(){
			for ( var i = 0 ; i < lastDay.getDate()  ; i++){
				this.days[i]=i;
			}
		},

		onSuccess(response){
			this.expenses = response.data;
			this.setDays();
		},
		setWeekExpenses( weekNumber){
			return this.expenses.filter( (expense) => {
				return expense.weekOfMonth==weekNumber;
			});
		}
	},

	computed : {
	},

	created(){
		this.getMonthExpenses();
		console.log(firstDay);
		console.log(lastDay);
	}
}
	
</script>


<style>
	
</style>