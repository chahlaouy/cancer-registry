<template>
    <div>
        <div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="AddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddUserLabel">Ajouter un Utilisateur</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addUser">
                        <div class="modal-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" v-model="form.name"  required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de pasee</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="form.password" name="password" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer Votre mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right" >Role</label>
                            <div class="col-md-6">
                                <select name="role" id="role" v-model="form.role" class="form-control">
                                    <option value="role_user">Chercheur</option>
                                    <option value="role_admin">Administrateur</option>
                                </select>

                            </div>

                            
                        </div>

                        </div>
                        <div class="modal-footer row">
                            <div class="alert alert-success col-md-6" role="alert" v-if="success">
                                {{success}}
                            </div>
                            <div class="col-md-4">

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <!-- <button type="submit" class="btn btn-primary" @click="updateUser" v-else>Modifier  v-if="form.name == ''"</button> -->
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalUser',
    
    data(){
        return {
            success: null,
            form: {
                id: '',
                name: '',
                email: '',
                password: '',
                role: ''
            }
        }
    },
    methods: {
        addUser(){
            axios.post('api/user', this.form)
                .then((rep) => {
                    this.success = "Utilisatuer a ete ajouter avec succes"
                    this.$emit('event-add-user')

                }).catch((e) => {
                    this.success = "loperation a ete echouee s il vous plait essayer une autre fois"
                })
        },
        updateUser(){
            this.form.patch('api/user/' + this.form.id)
                .then(({ data }) => {
                    console.log(data)
                    this.$emit('event-add-user')

                }).catch(({ data }) => {
                    console.log(data)
                })
        }
    },
   
}
</script>