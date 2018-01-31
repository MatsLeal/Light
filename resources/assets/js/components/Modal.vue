<template>
<div class="modal is-active" v-if="showModal" >
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">
      	<slot name="title"></slot>
      </p>
      <button class="delete" aria-label="close" @click.prevent="showModal=false"></button>
    </header>
    <section class="modal-card-body">
      <slot name="content"></slot>
    </section>
    <footer class="modal-card-foot">
    	<slot name="footer"></slot>
    </footer>
  </div>
</div>
</template>


<script >
	export default {
		props : {
			name
		},
		data(){
			return {
				showModal : false
			};
		},
		mounted () {
			Event.$on('hideModal', function (modalname){
				if(this.name==modalname){
					this.showModal=false;
				}
			}.bind(this));

			Event.$on('showModal',function(modalname){
				if(this.name==modalname){
					this.showModal=true;
				}
			}.bind(this));
		},
	}	
</script>


<style >
	
</style>