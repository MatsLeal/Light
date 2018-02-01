<template>
<div class="box">
	<div class="field is-horizontal">
		<div class="field-body">
			<div class="field">
			<form @keyup.enter="submitType(IncomeTypeForm)" @submit.prevent="" @keydown="IncomeTypeForm.errors.clear($event.target.name)" >
				<input type="text" class="input" v-model="IncomeTypeForm.description" placeholder="Type and hit enter to add an income categorie">
				<span class="help is-danger"  v-if="IncomeTypeForm.errors.has('description')" v-text="IncomeTypeForm.errors.get('description')"></span>
			</form>
			</div>
			<div class="field">
			<form @keyup.enter="submitType(ExpenseTypeForm)" @submit.prevent="" @keydown="ExpenseTypeForm.errors.clear($event.target.name)" >
				<input type="text" class="input" v-model="ExpenseTypeForm.description" placeholder="Type and hit enter to add an expense  categorie">
				<span class="help is-danger"  v-if="ExpenseTypeForm.errors.has('description')" v-text="ExpenseTypeForm.errors.get('description')"></span>
			</form>
			</div>
		</div>
	</div>
</div>	
</template>


<script>
	export default {
		data(){
			return {
				IncomeTypeForm : new Form({
					description : '',
					type : 1
				}),

				ExpenseTypeForm : new Form({
					description : '',
					type : 0
				})
			}
		},
		methods : {
			submitExpenseType(){
				this.ExpenseTypeForm.post('/types',this.ExpenseTypeForm.data())
				.then(response)
			},
			submitType(form){
				form.post('/types',form.data)
				.then(response=>{
					form.description='';
					this.onSuccess(response)
				})
				.catch(error=> this.onFail(error))
			},
			onSuccess(response){
				Event.$emit('type-added');
				Event.$emit('notify-success',response.message);
			},
			onFail(error){
				Event.$emit('notify-error',error.message);
			}
		}
	}
	
</script>

<style>
	
</style>