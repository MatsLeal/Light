window.Event = new Vue();
import Notify from 'vue-notify-me'
const bus = new Vue();


import Vue from 'vue';
import axios from 'axios';
import Form from './core/Form.js';
import ExpenseList from './components/Expense/List.vue';
import ExpenseCreate from './components/Expense/Create.vue';
import Notification from './components/Notification';
import TypeList from './components/Type/List.vue';
import TypeCreate from './components/Type/Create.vue';
window.axios= axios;
window.Form= Form;


var app = new Vue({
	el : '#home',
	components:{
		'expense-list' : ExpenseList,
		'notification' : Notification,
		'expence-create' : ExpenseCreate
	}
});

var types = new Vue({
	el : '#types',
	components : {
		'type-list' : TypeList,
		'type-create' : TypeCreate,
		'notification' : Notification
	}
});