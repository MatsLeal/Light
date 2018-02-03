window.Event = new Vue();
import Notify from 'vue-notify-me'
const bus = new Vue();


import Vue from 'vue';
import axios from 'axios';
import Form from './core/Form.js';
import Notification from './components/Notification';
import TypeList from './components/Type/List.vue';
import TypeCreate from './components/Type/Create.vue';
import TransactionList from './components/TransactionList.vue';
import TransactionCreate from './components/TransactionCreate.vue';
window.axios= axios;
window.Form= Form;


var app = new Vue({
	el : '#home',
	components:{
		'notification' : Notification,
		'transaction-list' : TransactionList,
		'transaction-create' : TransactionCreate
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
