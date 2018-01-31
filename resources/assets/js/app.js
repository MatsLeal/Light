window.Event = new Vue();

import Vue from 'vue';
import axios from 'axios';
import Form from './core/Form.js';
import List from './components/Expense/List.vue';
import Notification from './components/Notification';
window.axios= axios;
window.Form= Form;


var app = new Vue({
	el : '#home',
	components:{
		'expenselist' : List,
		'notification' : Notification
	}
});