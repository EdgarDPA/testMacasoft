<template>
<div class="panel panel-default">
            <div class="panel-heading" >Lista de usuarios</div>
         <div class="panel-body">
    
        
        <div class="row">
            <div class="col-lg-2 col-xs-6">
                <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#myModal">Agregar Usuario</button>
            </div>
        </div>
        <alta-component  @new="addUsuario"></alta-component>
        <br>
<div class="table-responsive">
        <table class="table " >
            <thead>
              <tr>
                <th>  </th>          
                <th>N°</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Tipo de usuario</th>
                <th></th>
              </tr>
            </thead>
            <tbody> 
                <fila-component
                 v-for="(usuario, index) in usuarios"
                  :key="usuario.id"
                  :usuario="usuario"
                  @update="updateUsuario(index, ...arguments)"
                 @delete="deleteUsuario(index)">
                  </fila-component>
     </tbody>
     </table>
        </div>
        </div>

        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
        
</template>

<script>
    export default {
    data(){
        return{
            usuarios: []
        }
    },
        mounted() {
            axios.get('usuarios').then((response) =>{
                this.usuarios = response.data;
            });
        },

        methods:{
            addUsuario(usuario) {
                this.usuarios.push(usuario);
            },
            updateUsuario(index, usuario) {
                this.usuarios[index] = usuario;
            },
            deleteUsuario(index) {
                this.usuarios.splice(index,1);
            }
        }
    }
</script>
