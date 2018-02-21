<template lang="html">
  <div class="box">
    <expence-create :types="expenseType" :created_at="created_at"></expence-create>
    <income-create :types="incomeType" :created_at="created_at" ></income-create>
  </div>
</template>

<script>

import ExpenseCreate from './Expense/Create.vue';
import IncomeCreate from './Income/Create.vue';

export default {
  props : {
      created_at : {
        default : null,
        type : String
      }
  },

  data(){
    return {
      types : []
    }
  },

  methods : {
      getTypes(){
        axios.get('/types')
        .then(response=> this.onSuccess(response))
        .catch( error=> this.onFail(error))
      },
      onSuccess(response){
          this.types=response.data;
      },
      onFail(error){
        console.log(error);
      }
  },

  computed : {
        expenseType(){
          return this.types.filter((type)=>{ return type.type==0 ;})
        },
        incomeType(){
          return this.types.filter((type)=>{ return type.type==1 ;})
        }
  },

  created(){
    this.getTypes();
  },
  components : {
    'expence-create' : ExpenseCreate,
    'income-create' : IncomeCreate,
  }
}
</script>

<style lang="css">
</style>
