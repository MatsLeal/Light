<template>
	<div class="box">
		<expense-card 
		v-for="item in items" 
		:data="item" 
		:key="item.id" 
		@deleted="destroy(item)"></expense-card>
	</div>
</template>


<script>
import moment from 'moment';
import ExpenseCard from './ExpenseCard.vue';
import Collection from '../../libary/Collection.vue';
export default{
	name : 'ExpenseList',
	extends :  Collection,

	components : {
		'expense-card' : ExpenseCard 
	},

	data(){
		return {
			items : {},
			endPoint : '/expenses/',
			notifies: true,
			itemName : 'Expense'
		}
	},

	methods:{
		onSuccess(response){
			this.items=response.data;
			for (let e in this.items){
				this.items[e].created_at = moment(this.items[e].created_at).format('ll');
			}
		},
		
	},
	created(){
		Event.$on('expense-added',()=> this.getItems());
		this.getItems();
	},
}

</script>

<style>


</style>
