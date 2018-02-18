<template>
</template>

<script>
import Notification from '../../components/Notification.vue';
export default {

  name: 'Notify',

  data () {
    return {
    }
  },
  methods : {
  	notifySuccess(message){
  		if(message.length>0){
	  		Event.$emit('notify-success',message);
	  		return;
  		}
		Event.$emit('notify-success','Operation Successfull');
  	},
	notifyError(message){
  		if(message.length>0){
	  		Event.$emit('notify-error',message);
	  		return;
  		}
		Event.$emit('notify-success','Operation Successfull');
  	},

  }
}
</script>

<style lang="css" scoped>
</style>