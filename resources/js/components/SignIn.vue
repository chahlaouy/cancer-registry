<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Connexion</div>

                <div class="card-body">
                    <form @submit.prevent="logIn">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email addresse</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus v-model="form.email">

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" v-model="form.password">

                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary">
                                    Connexion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'SingIn',
    data(){
        return {
            form: new Form({
                email: '',
                password: ''
            })
        }
    },
    methods: {
        logIn(){
            this.form.post('api/auth/connexion')
                .then(({ data }) => {
                    console.log(data)

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