<template>
    <div>
        <div class="modal fade" id="AddSuivie" tabindex="-1" role="dialog" aria-labelledby="AddSuivieLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddSuivieLabel">Ajouter un Suivie</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addSuivie">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Date Derniere Contact</label>
                                <input v-model="form.date_derniere_contact" type="date" name="date_derniere_contact"
                                    class="form-control form-control-sm">
                                
                            </div>

                            <div class="form-group">
                                <label>Statut</label>
                                <input v-model="form.statut" type="text" name="statut"
                                    class="form-control form-control-sm">
                                
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
    props: ['id'],
    data(){
        return {
            success: null,
            form:{
                date_derniere_contact: '',
                statut: '',
            }
        }
    },
    methods: {
        addSuivie(){
            axios.post('api/suivie/' + this.id, this.form)
                .then((rep) => {
                    this.success = "Suivie a ete ajouter avec succes"
                    this.$emit('event-add-user')

                }).catch((e) => {
                    this.success = "loperation a ete echouee s il vous plait essayer une autre fois"
                })
        },
       
    },
   
}
</script>