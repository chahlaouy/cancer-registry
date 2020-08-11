<template>
    <div class="container mt-5">
        <h1 class="px-5">Cancer Registry</h1>
        <div class="row text-center">
            <div class="col-6  p-5">
                <router-link to="liste-patients" class="nav-link border border-success">
                  <i class="fas fa-folder-plus fa-4x nav-icon"></i>
                  <p>créer un enregistrement</p>
                </router-link>
            </div>
            <div class="col-6 p-5">
                <router-link to="patients" class="nav-link border border-success">
                  <i class="fas fa-pen-square fa-4x nav-icon"></i>
                  <p>Feuilleter/Éditer</p>
                </router-link>
            </div>
            <div class="col-6 p-5">
                <router-link to="users" class="nav-link border border-success">
                  <i class="fas fa-user-plus fa-4x nav-icon"></i>
                  <p>Ajouter un utilisateur</p>
                </router-link>
            </div>
            <div class="col-6 p-5">
                <router-link to="profile" class="nav-link border border-success">
                 <i class="nav-icon fas fa-user fa-4x"></i>
                    <p>
                        Profile
                    </p>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
