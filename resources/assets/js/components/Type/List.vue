<template>

<div class="box">
<div class="tile is-ancestor">
  <div class="tile ">
    <div class="box">
      <h2 class="title"> Incomings </h2>
            <div class="field is-grouped is-grouped-multiline">
                    <div class="control" v-for="type in incomingTypes " :key="type.id">
                        <div class="tags has-addons">
                              <a class="tag is-info is-large">{{type.description}}</a>
                              <a class="tag is-large is-delete" @click="destroy(type)"></a>
                        </div>
                    </div>
                </div>
    </div>
  </div>


          <div class="tile">
            <div class="box">
            <h2 class="title"> Expenses </h2>
            <div class="field is-grouped is-grouped-multiline">
                    <div class="control" v-for="type in expenseTypes " :key="type.id">
                        <div class="tags has-addons">
                              <a class="tag is-danger is-large">{{type.description}}</a>
                              <a class="tag is-large is-delete" @click="destroy(type)"></a>
                             </a>
                        </div>
                    </div>
                </div>
                </div>
          </div>

</div>
</div>
</div>
</template>


<script>
  export default {
      data(){
            return {
                types : []
            }
      },
      methods : {
            getTypes(){
                axios.get('/types')
                .then(response => this.onSuccess(response))
                .catch(error=> this.onFail(error))
            },
            destroy(type){
                axios.delete('/types/'+type.id)
                .then(response=>{
                  this.types.splice(this.types.indexOf(type),1);
                  Event.$emit('notify-success',response.data.message);
                })
                .catch(error=> {
                  Event.$emit('notify-error','Could not delete type !');
                })
            },
            onSuccess(response){
                  console.log(response.data);
                  this.types=response.data;
            },
            onFail(error){
                  console.log(error);
                  Event.$emit('notify-error','Could not fetch the categories !');
            }
      },
      computed : {
            incomingTypes(){
                return this.types.filter((type) => {
                    return type.type==1;
                });
            },
            expenseTypes(){
                return this.types.filter( (type) => {
                  return type.type==0;
                });
            }
      },
      mounted(){
        Event.$on('type-added',()=>this.getTypes());
        this.getTypes();
      }
  }

</script>

<style>

</style>
