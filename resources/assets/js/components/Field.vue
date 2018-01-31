<template>

	<div class="field">
            <label class="label">{{name}}</label>
            <div class="control">
            	<slot></slot>
<!--               <input class="input" type="text" placeholder="Coffee Type" name="name" v-model="form.name">
              <span class="help is-danger"  v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
 -->            </div>
          </div>    
</template>


<script >
	export default {
		props : {
			name : String
		}
	}
</script>