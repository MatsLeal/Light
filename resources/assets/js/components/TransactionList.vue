<template lang="html">
        <div class="tile">
              <div class="tile">
                  <expense-list></expense-list>
              </div>
              <div class="tile">
                  <incoming-list></incoming-list>
              </div>
        </div>
</template>

<script>
      import ExpenseList from './Expense/List.vue';
      import IncomeList from './Income/List.vue';
export default {
      components : {
          'expense-list' : ExpenseList,
          'incoming-list': IncomeList
      }
}
</script>

<style lang="css">
</style>
