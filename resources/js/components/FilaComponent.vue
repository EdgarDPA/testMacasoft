<template>

    <tr>                
            <td><img class="img-responsive" style="width: 50px; height: 50px;" v-bind:src="usuario.avatar"></td>
            <td><label>{{ usuario.id }}</label></td>
              <td>
              <input v-if="editMode" type="text" class="form-control" v-model="usuario.name">
              <label v-else>{{ usuario.name }}</label>
              </td>
              <td>
              <input v-if="editMode" type="text" class="form-control" v-model="usuario.email">
              <label v-else>{{ usuario.email }}</label>
              </td>

              <td>           
              <select required class="form-control" v-if="editMode" v-model="usuario.type">
                <option disabled value="">Seleccione uno</option>
                <option value="1" >Administrador</option>
                <option value="2" >Vendedor</option>
                <option value="3" >Cliente</option>
              </select>
              <label v-else-if="usuario.type == 1">Administrador</label>
              <label v-else-if="usuario.type == 2">Vendedor</label>
              <label v-else-if="usuario.type == 3">Cliente</label>
              </td>

              


              
                
                <td style="text-align: center">

                <a v-if="editMode" class="btn btn-primary" v-on:click="onClickUpdate"> Guardar</a>
                <a v-else class="btn btn-warning"  v-on:click="onClickEdit"> Editar</a>

                <a class="btn btn-danger" v-on:click="onClickDelete">Eliminar</a>
                
                </td>
     </tr>
     
</template>

<script>
    export default {
    props: ['usuario'],
    data(){
        return{
            editMode: false
        }
    },
        mounted() {
            console.log('Component mounted.')
        },
        methods: { 
          onClickDelete(){
          axios.delete('usuarios/' + this.usuario.id).then(() => {        
           
            this.$emit('delete');
          });
            
          },
          onClickEdit(){
            this.editMode = true;
          },
          onClickUpdate(){

          const params = {
                name: this.usuario.name,
                email: this.usuario.email,
                type: this.usuario.type,
                

            };

          axios.put('usuarios/' + this.usuario.id , params).then((response) =>{
            this.editMode = false;
            const usuario = response.data;
            this.$emit('update', usuario);
          });
          
          }
        }
    }
</script>