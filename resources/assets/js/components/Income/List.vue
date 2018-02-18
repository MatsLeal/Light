<template lang="html">
  <div class="box">
    <income-card v-for="income in incomings" :data="income" :key="income.id" @deleted="onIncomeDeleted(income)"></income-card>
  </div>
</template>

<script>
  import moment from 'moment';
  import IncomeCard from './IncomeCard.vue';
export default {
  components : {
     'income-card' : IncomeCard
  },

      data(){
        return {
            incomings : []
        }
      },

      methods : {
            getIncomings(){
                axios.get('/incomings')
                .then( response => this.onSuccess(response))
                .catch( error => this.onFail(error))
            },
            onSuccess(response){
                this.incomings=response.data;
                for (let e in this.incomings){
                  this.incomings[e].created_at = moment(this.incomings[e].created_at).format('ll');
                }

            },
            onFail(error){
                Event.$emit('notify-error','Could not fetch incomings !')
            },
            onIncomeDeleted(income){
              this.incomings.splice(this.incomings.indexOf(income),1);
            }
      },

      created(){
		      Event.$on('income-added',()=> this.getIncomings());
          this.getIncomings();
      }
}
</script>

<style lang="css">
</style>
