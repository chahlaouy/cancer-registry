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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" placeholder="Confirmer mot de passe" >Confirmer Votre mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" @click="addUser" v-if="form === null">Ajouter</button>
                            <button type="submit" class="btn btn-primary" @click="updateUser" v-else>Modifier</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalComponent',
    props: ['form'],
    methods: {
        addUser(){
            this.form.post('api/user')
                .then(({ data }) => {
                    console.log(data)
                    this.$emit('event-add-user')

                }).catch(({ data }) => {
                    console.log(data)
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