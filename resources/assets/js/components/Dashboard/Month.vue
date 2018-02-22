<template>
	
<div>
	<!-- <notification></notification> -->
	<modal name="addExpenseOnDay">
		<div slot="title"> 
			Register a new Transaction 
			
		</div>
	
		<div slot="content">
			<notification></notification>
			<transaction-create :created_at="date"></transaction-create>
		</div>
		<div slot="footer">
			<button class="button is-primary">Register</button>
		</div>
	</modal>

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
import Modal from '../Modal.vue';
import TransactionCreate from '../TransactionCreate.vue';
var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
export default {
	components : {
		'week' : Week,
		'notification' : Notification,
		'modal' : Modal,
		'transaction-create' : TransactionCreate
	},

	data(){
		return {
			expenses : [],
			days : [],
			firstDay : moment(firstDay).day(),
			lastDay : moment(lastDay).day(),
			date : null
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
						 date : cursor.format('YYYY-MM-D h:mm:ss'),
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
		},
		addExpenseOnDay(day){
			Event.$emit('showModal','addExpenseOnDay');
			this.date=day;
			console.log(day);
		}

	},

	created(){
		this.getMonthExpenses();
		Event.$on('addExpenseOnDay',(date) => this.addExpenseOnDay(date));
		Event.$on('expense-added',() => this.getMonthExpenses());
		Event.$on('expense-deleted',(expense)=>{
			this.expenses.splice(this.expenses.indexOf(expense),1);
		})
	}
}
	
</script>


<style>
	
</style>