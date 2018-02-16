<template>
	<div>
		<div class="tile" style=" padding-right: 50px ; padding-bottom: 20px">
			<article class="tile is-child notification ">

		          <p class="subtitle"> {{ name }}  </p>

		          <div v-for="expense in expenses" class="field is-grouped is-grouped-multiline">

			  <div class="control" >
				    <div class="tags has-addons">
				      <span class="tag is-danger" >
				      	{{ expense.type}}
				      </span>
				      <span class="tag is-dark" style="text-decoration: none">
				      	${{ expense.amount }}
				      </span>
				      <span class="tag is-delete"></span>
				    </div>
			  </div>

			</div>
		        </article>
		</div>
	</div>	
</template>


<script>

export default {

	props: {
		name : String,
		number : String,
		expenses : Array
	}

}
	
</script>


<style>

</style>