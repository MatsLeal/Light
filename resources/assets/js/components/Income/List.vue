<template lang="html">
  <div class="box">
    <div class="card" v-for="income in incomings" style="padding-top : 20 px">
  <header class="card-header">
    <p class="card-header-title">
      {{income.created_at}}
      i spent {{income.amount}}
    </p>
  </header>
  <div class="card-content">
    <div class="content">
      {{income.description}}
    </div>
  </div>
</div>
  </div>
</template>

<script>
  import moment from 'moment';
export default {

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
                console.log(error);
                Event.$emit('notify-error','Could not fetch incomings !')
            }
      },

      created(){
          this.getIncomings();
      }
}
</script>

<style lang="css">
</style>
