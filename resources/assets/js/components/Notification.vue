<template>
	<div class="notification" :class="type" v-if="showNotification">
	  <button class="delete" @click="showNotification=false"></button>
	  {{ text }}
	</div>
</template>


<script>
	export default {
		data(){
			return {
				showNotification : false,
				type : '',
				text : ''
			}
		},
		created(){
			Event.$on('notify',function (data){
				this.type=data[0];
				this.text=data[1];
				this.showNotification=true;
			}.bind(this));

			Event.$on('notify-success',function (message){
				this.type='is-success';
				this.text=message;
				this.showNotification=true;
			}.bind(this));

			Event.$on('notify-error',function (message){
				this.type='is-danger';
				this.text=message;
				this.showNotification=true;
			}.bind(this));
		}
	}	
</script>


<style>
</style>