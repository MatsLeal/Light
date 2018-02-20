<template>
</template>

<script>
import Notify from './Notification/Notify.vue';
export default {
 
  name: 'Collection',

  extends : Notify,

  data () {
    return {
    	items : {},
    	notifies : false,
    	errorMessage : 'There was an error with your resquest',
    	successMessage : 'Request completed  !',
    	itemName : "item",
      endPoint : null
    }
  },
    methods : {
  	getItems(){
          		axios.get(this.endPoint)
          		.then(response=> this.onSuccess(response))
          		.catch(error=> this.onFail(error))
  	         },

  	onFail(error){
          		if(this.notifies){
          			this.notifyError(this.errorMessage);
          		}
  	},

  	onSuccess(response){
            		this.items=response.data;
            		if(this.notifies){
            			 this.notifySuccess(this.successMessage);
            		}
  	},

  	destroy(item){
  		this.items.splice(this.items.indexOf(item),1);
  		if(this.notifies){
  			this.notifySuccess(this.itemName+ ' deleted !');
  		}
  	},
  },

  	created(){
  		this.getItems();
  	}

}
</script>

<style lang="css" scoped>
</style>