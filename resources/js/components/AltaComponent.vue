<template>
    <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="background-color: #285675;color: #fff;">
                  <button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
                  <h4 class="modal-title"></span> &nbsp;Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" >
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Nombre</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" v-model="name"  autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">E-mail</label>
                          <div class="col-sm-10">          
                            <input type="text" class="form-control" id="email" name="email" v-model="email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="password">Contraseña</label>
                          <div class="col-sm-10">          
                            <input type="password" class="form-control" id="password" name="password" v-model="password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="type">Rol de usuario</label>
                          <div class="col-sm-10">     
                            
                            <select required class="form-control" v-model="type">
                              <option disabled value="">Seleccione uno</option>
                              <option value="1" >Administrador</option>
                              <option value="2" >Vendedor</option>
                              <option value="3" >Cliente</option>
                            </select>

                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="avatar">Avatar</label>
                          <div class="col-sm-10">                           
                             <input type="file" @change="onImagenSelected">            
                          </div>
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success" data-dismiss="modal" v-on:click.prevent="newUsuario()">Aceptar</button>
                          </div>
                        </div>
                     </form>
                </div> 
                <div class="modal-footer" style="background-color: #ecf0f5;">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                </div>
              </div>
            </div>
          </div>

          </template>

<script>
    export default {
    data(){
        return {
            name: '',
            email: '',
            password: '',
            type: '',
        }
    },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
        onImagenSelected(event){
          this.imagenSeleccionada = event.target.files[0]
           },
            newUsuario(){
            const params = {
                name: this.name,
                email: this.email,
                password: this.password,
                type: this.type,
            };

            const fd = new FormData();
            fd.append('avatar', this.imagenSeleccionada, this.imagenSeleccionada.name)
            fd.append('name', this.name)
            fd.append('email', this.email)
            fd.append('password', this.password)
            fd.append('type', this.type)

            this.name = '';
            this.email= '';
            this.password = '';
            this.type = '';

            axios.post('usuarios', fd).then((response)=>{
            const usuario = response.data;
             this.$emit('new', usuario);
            });
            let usuario = {
                id: 2,
                name: this.name,
                email: this.email,
                type: 2
            };
           
            
                
            }
        }
    }
</script>
