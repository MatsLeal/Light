<template>
<div class="box">
  Expense
  <form @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">
    <div class="field is-horizontal">
      <div class="field-body">
        <div class="field">
          <p class="control is-expanded has-icons-left">
            <input class="input"
                   type="text"
                   placeholder="Amount"
                   name="amount"
                   v-model="form.amount">
            <span class="icon is-small is-left">
            $
          </span>
          </p>
          <span class="help is-danger"
                v-if="form.errors.has('amount')"
                v-text="form.errors.get('amount')"></span>
        </div>
        <div class="field">
          <p class="control is-expanded ">
            <input class="input "
                   type="text"
                   placeholder="Description"
                   name="description"
                   v-model="form.description">
          </p>
          <span class="help is-danger"
                v-if="form.errors.has('description')"
                v-text="form.errors.get('description')"></span>
        </div>
        <div class="select">
          <select v-model="form.type_id">
            <option v-for="type in types"
                    :value="type.id"> {{ type.description}}</option>
          </select>
        </div>
        <p class="control">
          <button class="button is-primary"
                  :disabled="form.errors.any()">
            +
          </button>
        </p>
      </div>
    </div>
  </form>
</div>

</template>

<script>
export default {
  props: {
    types: Array,
    created_at : {
      default : null,
      type : String
    }
  },
  data() {
    return {
      form: new Form({
        amount: '',
        description: '',
        type_id: null,
        created_at : this.created_at
      })

    }
  },

  methods: {
    onSubmit() {
      this.form.post('/expenses', this.form.data())
        .then(response => this.onSuccess(response))
        .catch(error => this.onFail(error))
    },

    onSuccess(response) {
      Event.$emit('notify-success', response.message)
      this.form.reset();
      Event.$emit('expense-added')
    },

    onFail(error) {
      Event.$emit('notify-error', error.message)
    }
  }
}

</script>

<style>
</style>
