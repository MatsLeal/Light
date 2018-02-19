<template>
	
<div>
	<notification></notification>

<div class="tile is-ancestor">
	<week :expenses="setWeekExpenses(1)"
		:days="setWeekDays(1)" 
		:firstDay="firstDay">
	</week>	

	<week :expenses="setWeekExpenses(2)"
		:days="setWeekDays(2)">
	</week>	

	<week :expenses="setWeekExpenses(3)"
		:days="setWeekDays(3)">
	</week>	

	<week :expenses="setWeekExpenses(4)"
		:days="setWeekDays(4)">
	</week>	

	<week :expenses="setWeekExpenses(5)"
		:days="setWeekDays(5)" 
		:lastDay="lastDay">
	</week>	
</div>
</div>
</template>


<script>
import moment from 'moment';
import Week from './Week.vue';
import Notification from '../Notification.vue';
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
			firstDay : moment(firstDay).day(),
			lastDay : moment(lastDay).day(),
			}
	},
	methods : {
		getMonthExpenses(){
			var date= new Date();
			axios.get('/monthexpenses/'+(date.getMonth() + 1))
			.then(response => this.onSuccess(response))
		},

		setDays(){
			var cursor = moment(firstDay);
			for ( var i = 0 ; i < lastDay.getDate()  ; i++){
				this.days[i]=
					{
						 date : cursor.format('YYYY-D-MM h:mm:ss'),
						 weekNumber :  cursor.week() - moment(cursor).startOf('month').week() + 1,
						 weekDay : cursor.day(),
						 day : cursor.date()
					};
				cursor.add(1,'d');
			}
		},


		setWeekDays(weekNumber){
			return this.days.filter((day)=>{return day.weekNumber==weekNumber});
		},

		onSuccess(response){
			this.expenses = response.data;
			this.expenses.forEach((expense)=>{
				var cursor = moment(expense.created_at);
				expense.weekOfMonth= cursor.week() - moment(cursor).startOf('month').week() + 1;
			});
			this.setDays();
		},
		setWeekExpenses( weekNumber){
			return this.expenses.filter( (expense) => {
				return expense.weekOfMonth==weekNumber;
			});
		}
	},

	created(){
		this.getMonthExpenses();
	}
}
	
</script>


<style>
	
</style>