<template>
    <div class="container">
        <modal-user v-on:event-add-user="refreshUsers"></modal-user>
        <modal-modify-user :form='newForm' v-on:event-add-user="refreshUsers"></modal-modify-user>
        <button class="btn btn-success my-4 float-right" data-toggle="modal" data-target="#AddUser">
            <i class="fa fa-user-plus"></i>
            créer un Utilisateur
        </button>
        <div class="clearfix">
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste patient</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>email</th>
                      <th>role</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users" :key="user.id" >
                      <td>{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.role}}</td>
                      <td>
                          <button type="button" class="btn btn-warning" @click="bindUser(user)" data-toggle="modal" data-target="#modifyUser">
                            <i class="fas fa-edit"></i>
                          </button>
                      </td>
                      <td>
                          <button type="button" class="btn btn-danger" @click="deleteUser(user.id)">
                            <i class="fas fa-trash"></i>
                          </button>
                      </td>
                      
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</template>

<script>
import ModalUser from './ModalUser'
import ModalModifyUser from './modals/ModalModifyUser'
    export default {
        name: 'UsersComponent',
        data(){
            return {
                users: [], 
                newForm: {
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    role: ''
                }
            }
        },
        components: {
            ModalUser,
            ModalModifyUser

        },
        methods: {
            getUsers(){
                axios.get('api/user').then(({data}) => {
                    this.users = data;
                })
            },
            deleteUser(id){
              axios.delete('api/user/' + id).then(data => {
                this.getUsers();
              })
            },
            bindUser(user) {
              this.newForm.name = user.name
              this.newForm.email = user.email
              this.newForm.id = user.id
              this.newForm.role = user.role
              
            },
            refreshUsers(){
              this.getUsers();
            },
        },   
        created(){
            this.getUsers();
        }
    }
</script>
