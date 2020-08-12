<template>
    <div>
        <div class="modal fade" id="AddHopital" tabindex="-1" role="dialog" aria-labelledby="AddHopitalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddHopitalLabel">Ajouter un Hopital</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addHopital">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Hopital</label>
                                <input v-model="form.hopital" type="text" name="hopital"
                                    class="form-control form-control-sm">
                               
                            </div>

                            <div class="form-group">
                                <label>Numéro Laboratoire</label>
                                <input v-model="form.num_laboratoire" type="number" name="num_laboratoire"
                                    class="form-control form-control-sm">
                               
                            </div>

                            <div class="form-group">
                                <label>Numéro Cas</label>
                                <input v-model="form.num_cas" type="text" name="num_cas"
                                    class="form-control form-control-sm">
                                
                            </div>
                            <div class="form-group">
                                <label>Unité</label>
                                <input v-model="form.unite" type="text" name="unite"
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
    name: 'ModalHopital',
    props: ['id'],
    data(){
        return {
            success: null,
            form: {
                hopital: '',
                num_laboratoire: '',
                num_cas: '',
                unite: '',   
            }
        }
    },
    methods: {
        addHopital(){
            axios.post('api/hopital/' + this.id, this.form)
                .then((rep) => {
                    this.success = "Hopital a ete ajouter avec succes"
                    this.$emit('event-add-user')

                }).catch((e) => {
                    this.success = "loperation a ete echouee s il vous plait essayer une autre fois"
                })
        },
       
    },
   
}
</script>