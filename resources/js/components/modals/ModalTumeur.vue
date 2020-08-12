<template>
    <div>
        <div class="modal fade" id="AddTumeur" tabindex="-1" role="dialog" aria-labelledby="AddTumeurLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddTumeurLabel">Ajouter un Tumeur</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addTumeur">
                        <div class="modal-body">
                       
                        <div class="form-group">
                                        <label>Nom Tumeur</label>
                                        <input v-model="form.nom_tumeur" type="text" name="nom_tumeur"
                                            class="form-control form-control-sm">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Diagnostic de Base</label>
                                        <input v-model="form.diagnostic_de_base" type="text" name="diagnostic_de_base"
                                            class="form-control form-control-sm">
                                       
                                    </div>

                                    <div class="form-group">
                                        <label>Topographie</label>
                                        <input v-model="form.topographie" type="text" name="topographie"
                                            class="form-control form-control-sm">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Morphologie</label>
                                        <input v-model="form.morphologie" type="text" name="morphologie"
                                            class="form-control form-control-sm">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Comportement Tumoral</label>
                                        <input v-model="form.comportement_tumoral" type="text" name="comportement_tumoral"
                                            class="form-control form-control-sm">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Differenciation Histologique</label>
                                        <input v-model="form.differenciation_histologique" type="text" name="differenciation_histologique"
                                            class="form-control form-control-sm">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Classification TNM</label>
                                        <input v-model="form.classification_TNM" type="text" name="classification_TNM"
                                            class="form-control form-control-sm">
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>Extension</label>
                                        <input v-model="form.extension" type="text" name="extension"
                                            class="form-control form-control-sm">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Siege Metastase</label>
                                        <input v-model="form.siege_metastase" type="text" name="siege_metastase"
                                            class="form-control form-control-sm">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Date Incidence</label>
                                        <input v-model="form.date_incidence" type="date" name="date_incidence"
                                            class="form-control form-control-sm" >
                                       
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
    name: 'ModalTumeur',
    props: ['id'],
    data(){
        return {
            success: null,
            form: new Form({   
                nom_tumeur: '',
                diagnostic_de_base: '',
                topographie: '',
                morphologie: '',
                comportement_tumoral: '',
                differenciation_histologique: '',
                classification_TNM: '',
                extension: '',
                siege_metastase: '',
                date_incidence: '',      
            })
        }
    },
    methods: {
        addTumeur(){
            axios.post('api/tumeur/' + this.id, this.form)
                .then((rep) => {
                    this.success = "Tumeur a ete ajouter avec succes"
                    // this.$emit('event-add-user')

                }).catch((e) => {
                    this.success = "loperation a ete echouee s il vous plait essayer une autre fois"
                })
        },
       
    },
   
}
</script>