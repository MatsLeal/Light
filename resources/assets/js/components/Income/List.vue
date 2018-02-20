<template lang="html">
  <div class="box">
    <income-card v-for="item in items" :data="item" :key="item.id" @deleted="destroy(item)"></income-card>
  </div>
</template>

<script>
  import moment from 'moment';
  import IncomeCard from './IncomeCard.vue';
  import Collection from '../../libary/Collection.vue';
export default {
  extends : Collection ,
  components : {
     'income-card' : IncomeCard
  },

      data(){
        return {
            items : [],
            notifies : true,
            endPoint : '/incomings/',
            itemName : 'Incoming'
        }
      },

      methods : {
            onSuccess(response){
                this.items=response.data;
                for (let e in this.items){
                  this.items[e].created_at = moment(this.items[e].created_at).format('ll');
                }
            }
      },

      created(){
		      Event.$on('income-added',()=> this.getItems());
      }
}
</script>

<style lang="css">
</style>
